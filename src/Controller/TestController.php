<?php

namespace App\Controller;

use App\Entity\Transaction;
use App\Form\TransactionType;
use App\Repository\TarifsRepository;
use Dompdf\Dompdf;
use Dompdf\Options;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * @Route("api")
 */
class TestController extends AbstractController
{
    /**
     * @Route("/test", name="test")
     */
    public function index(ValidatorInterface $validator,Request $request,TarifsRepository $tar): Response
    {
        $transaction = new Transaction();
        $form = $this->createForm(TransactionType::class, $transaction);
        $form->handleRequest($request);

        $data=json_decode($request->getContent(),true);
        $form->submit($data);
        $errors = $validator->validate($transaction);

        if (count($errors) > 0) {
            $errorsString = (string) $errors;

            return new Response($errorsString);
        }
        $connecte = $this->getUser();
        $compte=$connecte->getCompte();

        if ($transaction->getMontant() > $compte->getSolde()){
            return $this->handleView($this->view(['erreur montant'=>'le montant que vous essayez d envoyer n est pas disponible'],Response::HTTP_UNAUTHORIZED));
        }

        //if ($form->isSubmitted() && $form->isValid()) {

            

            $frais=$tar->findFrais($transaction->getMontant());

            $transaction->setCode(date("d").date("m").date("Y").date("H").date("i").date("s"));
            $transaction->setDateEnv(new \Datetime());
            $transaction->setStatus('Disponible');
            $transaction->setFrais($frais[0]->getValeur());

            /*Calculs frais */
            $val=$transaction->getFrais();
            $transaction->setCommissionEnv(10*$val/100);
            $transaction->setCommissionRet(20*$val/100);
            $transaction->setCommissionPropre(40*$val/100);
            $transaction->setTaxe(30*$val/100);

            $transaction->setUser($connecte);
            
            $transaction->setCompteEnv($compte);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($transaction);
            $entityManager->flush();

            $compte->setSolde($compte->getSolde()-$transaction->getMontant()+$transaction->getCommissionEnv());

            $entityManager->persist($compte);
            $entityManager->flush();

            // $sms = new Sms('+221778083808', 'The cake is a lie');
            // $provider = $providerManager->getProvider('message_bird_provider_doc');
        
            // $provider->send($sms);
            // Configure Dompdf according to your needs
            $pdfOptions = new Options();
            $pdfOptions->set('defaultFont', 'Arial');
        
            // Instantiate Dompdf with our options
            $dompdf = new Dompdf($pdfOptions);
        
            // Retrieve the HTML generated in our twig file
            $html = $this->renderView('transaction/recuEnvoi.html.twig', [
                'transaction' => $transaction
            ]);
        
            // Load HTML to Dompdf
            $dompdf->loadHtml($html);
        
            // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
            $dompdf->setPaper('A4', 'portrait');

            // Render the HTML as PDF
            $dompdf->render();

            // Output the generated PDF to Browser (inline view)
            $dompdf->stream("recu.pdf", [
                "Attachment" => true
            ]);
    }
}
