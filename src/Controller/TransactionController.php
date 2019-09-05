<?php

namespace App\Controller;

use Exception;
use App\Entity\Partenaire;
use App\Entity\Transaction;
use App\Form\RetraitType;
use App\Form\TransactionType;
use App\Repository\TarifsRepository;
use App\Repository\TransactionRepository;
use FOS\RestBundle\Controller\FOSRestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * @Route("/api/transaction")
 */
class TransactionController extends FOSRestController
{
    /**
     * @Route("/", name="transaction_index", methods={"GET"})
     * @Security("has_role('ROLE_AdminWari') or has_role('ROLE_SuperAdminWari')")
     */
    public function index(TransactionRepository $transactionRepository, Request $request): Response
    {
        $data=json_decode($request->getContent(),true);
        $debut=$data['debut'];
        $fin=$data['fin'];
        $debut=(new \DateTime($debut));
        $fin=(new \DateTime($fin));
        $transactions = $transactionRepository->findByPeriode($debut,$fin);

        $encoders = [new JsonEncoder()]; // If no need for XmlEncoder
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);

        // Serialize your object in Json
        $jsonObject = $serializer->serialize($transactions, 'json', [
            'circular_reference_handler' => function ($object) {
                return $object->getId();
            }
        ]);

        // For instance, return a Response with encoded Json
        return new Response($jsonObject, 200, ['Content-Type' => 'application/json']);
    }

    /**
     * @Route("/envoi", name="transaction_envoi", methods={"GET","POST"})
     * @Security("has_role('ROLE_UserSimple') or has_role('ROLE_SuperAdminPartenaire') or has_role('ROLE_AdminPartenaire')")
     */
    function new (ValidatorInterface $validator, Request $request, TarifsRepository $tar): Response {
        $transaction = new Transaction();
        $form = $this->createForm(TransactionType::class, $transaction);
        $form->handleRequest($request);

        $data = json_decode($request->getContent(), true);
        $form->submit($data);
        $errors = $validator->validate($transaction);

        if (count($errors) > 0) {
            $errorsString = (string) $errors;

            return new Response($errorsString);
        }
        $connecte = $this->getUser();
        $compte = $connecte->getCompte();

        if ($transaction->getMontant() > $compte->getSolde()) {
            //return $this->handleView($this->view(['erreur montant' => 'le montant que vous essayez d envoyer n est pas disponible'], Response::HTTP_UNAUTHORIZED));
            throw new Exception('le montant que vous essayez d envoyer n est pas disponible');
        }


        $frais = $tar->findFrais($transaction->getMontant());

        $transaction->setCode(date("d") . date("m") . date("Y") . date("H") . date("i") . date("s"));
        $transaction->setDateEnv(new \Datetime());
        $transaction->setStatus('Disponible');
        $transaction->setFrais($frais[0]->getValeur());

        /*Calculs frais */
        $val = $transaction->getFrais();
        $transaction->setCommissionEnv(10 * $val / 100);
        $transaction->setCommissionRet(20 * $val / 100);
        $transaction->setCommissionPropre(40 * $val / 100);
        $transaction->setTaxe(30 * $val / 100);

        $transaction->setUser($connecte);

        $transaction->setCompteEnv($compte);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($transaction);
        $entityManager->flush();

        $compte->setSolde($compte->getSolde() - $transaction->getMontant() + $transaction->getCommissionEnv());

        $entityManager->persist($compte);
        $entityManager->flush();

        return $this->handleView($this->view(['status' => 'Transfert effectué avec succès'], Response::HTTP_CREATED));
        
    }

    /**
     * @Route("/retrait/{code}", name="transaction_retrait", methods={"GET","POST"})
     * @Security("has_role('ROLE_UserSimple') or has_role('ROLE_SuperAdminPartenaire') or has_role('ROLE_AdminPartenaire')")
     */
    public function retrait(Transaction $transaction, ValidatorInterface $validator, Request $request): Response
    {
        if (!$transaction || $transaction->getStatus() != 'Disponible') {
            if (!$transaction) {
                $msg = 'le code est invalide';
            } elseif ($transaction->getStatus() == 'Retiré') {
                $msg = 'envoi déjà retiré';
            } else {
                $msg = 'envoi remboursé';
            }
            //return $this->handleView($this->view(['erreur' => $msg], Response::HTTP_UNAUTHORIZED));
            throw new Exception($msg);
        }
        $form = $this->createForm(RetraitType::class, $transaction);
        $form->handleRequest($request);

        $data = json_decode($request->getContent(), true);
        $form->submit($data);
        $errors = $validator->validate($transaction);

        if (count($errors) > 0) {
            $errorsString = (string) $errors;

            return new Response($errorsString);
        }
        $connecte = $this->getUser();
        $compte = $connecte->getCompte();


        $type = $form->get('typeRetrait')->getData();

        $transaction->setDateRet(new \Datetime());
        if ($type == 'retrait') {
            $transaction->setStatus('Retiré');
        } elseif ($type == 'remboursement') {
            $transaction->setStatus('Remboursé');
        } else {
            //return $this->handleView($this->view(['erreur' => 'choisir remboursement ou retrait'], Response::HTTP_UNAUTHORIZED));
            throw new Exception('choisir remboursement ou retrait');
        }

        $transaction->setUserRet($connecte);

        $transaction->setCompteRet($compte);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($transaction);
        $entityManager->flush();

        $compte->setSolde($compte->getSolde() + $transaction->getMontant() + $transaction->getCommissionRet());

        $entityManager->persist($compte);
        $entityManager->flush();

        return $this->handleView($this->view(['status' => 'Retrait effectué avec succès'], Response::HTTP_CREATED));

    }

    /**
     * @Route("/{id}", name="transaction_show", methods={"GET"})
     */
    public function show(Transaction $transaction): Response
    {
        return $this->handleView($this->view($transaction));
    }

    /**
     * @Route("/partenaire/details/{id}", name="transaction_partenaire_details", methods={"GET"})
     * @Security("has_role('ROLE_SuperAdminPartenaire') or has_role('ROLE_AdminPartenaire')")
     */
    public function detailsOperationPartenaire(Partenaire $partenaire, ValidatorInterface $validator, Request $request, TransactionRepository $transactionRepository): Response
    {
        $data=json_decode($request->getContent(),true);
       
        $debut=$data['debut'];
        $fin=$data['fin'];
        $debut=(new \DateTime($debut));
        $fin=(new \DateTime($fin));
        $transactions = $transactionRepository->findByPeriode($debut,$fin);
        $partenaires=[];
        for ($i=0; $i < count($transactions); $i++) { 
            if(($transactions[$i]->getCompteEnv()!=NULL && $partenaire==$transactions[$i]->getCompteEnv()->getPartenaire()) || ($transactions[$i]->getCompteEnv()!=NULL && $partenaire==$transactions[$i]->getCompteRet()->getPartenaire())){
                $partenaires=$transactions[$i];
            }
        }

        $encoders = [new JsonEncoder()]; // If no need for XmlEncoder
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);

        // Serialize your object in Json
        $jsonObject = $serializer->serialize($partenaires, 'json', [
            'circular_reference_handler' => function ($object) {
                return $object->getId();
            }
        ]);

        // For instance, return a Response with encoded Json
        return new Response($jsonObject, 200, ['Content-Type' => 'application/json']);
    }

    /**
    * @Route("/tarif", name="recherche_tarif", methods={"POST"})
    */
    public function tarif(Request $request,TarifsRepository $tarifRepository): Response
    {
        $data=json_decode($request->getContent(),true);
       
        $montant=$data['montant'];
        $frais = $tarifRepository->findFrais($montant);
        return $this->handleView($this->view($frais));
    }

    /**
    * @Route("/recherchecode", name="recherche_code", methods={"POST"})
    */
    public function searchPartenaire(Request $request, TransactionRepository $transactionRepository): Response
    {
        $data=json_decode($request->getContent(),true);
       
        $code=$data['code'];
        $transaction = $transactionRepository->findOneBy(['code'=>$code]);
        if(!$transaction){
            throw new Exception('Ce code est invalide');
        }elseif ($transaction->getStatus()=='Retiré') {
            throw new Exception('Argent déjà retiré');
        }elseif ($transaction->getStatus()=='Remboursé') {
            throw new Exception('Transaction Remboursée');
        }
        return $this->handleView($this->view($transaction));
    }

}
