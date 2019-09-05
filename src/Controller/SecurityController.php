<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;
use App\Form\UserType;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use App\Repository\UserRepository;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use App\Form\MotDePasseType;
use App\Entity\MotDePasse;
use App\Entity\Partenaire;
use Exception;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

/**
 * @Route("/api/users")
 */
class SecurityController extends AbstractFOSRestController
{
    private $status='Actif';
    private $plain='plainPassword';
    private $message='status';
    /**
    * @Route("/register", name="app_register")
    * @Security("has_role('ROLE_AdminWari') or has_role('ROLE_SuperAdminPartenaire') or has_role('ROLE_SuperAdminWari') or has_role('ROLE_AdminPartenaire')")
    */
    public function register(ValidatorInterface $validator,Request $request, UserPasswordEncoderInterface $passwordEncoder): Response
    {
        $user = new User();
        $connecte = $this->getUser();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        $data=json_decode($request->getContent(),true);

        if(!$data){
            $data=$request->request->all(); 
        }

        $form->submit($data);

        $errors = $validator->validate($user);
        if (count($errors) > 0) {
            $errorsString = (string) $errors;

            return new Response($errorsString);
        }
        if(!$form->get($this->plain)->getData() || strlen($form->get($this->plain)->getData())<6){
            if(!$form->get($this->plain)->getData()){
                $msg='Veuillez renseigner le mot de passe';
            }
            else{
                $msg='le mot de passe doit avoir au moins 6 caractères';
            }
            throw new Exception($msg);
            //return $this->handleView($this->view([$this->message=>$msg],Response::HTTP_UNAUTHORIZED));
        }

       // if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
                $passwordEncoder->encodePassword(
                    $user,
                    $form->get($this->plain)->getData()
                )
            );
            
            if($connecte->getRoles()[0]=='ROLE_SuperAdminPartenaire' || $connecte->getRoles()[0]=='ROLE_AdminPartenaire'){
                if($user->getRole()==3){
                    $user->setRoles(['ROLE_AdminPartenaire']);
                }elseif($user->getRole()==4){
                    $user->setRoles(['ROLE_UserSimple']);
                }else{
                    throw  new Exception('Vous ne pouvez choisir que les roles Admin (3) et User (4)');
                    //return $this->handleView($this->view([$this->message=>'Vous ne pouvez choisir que les roles Admin (3) et User (4)'],Response::HTTP_UNAUTHORIZED));
                }
                $user->setPartenaire($connecte->getPartenaire());
            }elseif($connecte->getRoles()[0]=='ROLE_SuperAdminWari' || $connecte->getRoles()[0]=='ROLE_AdminWari'){
                if($user->getRole()==1){
                    $user->setRoles(['ROLE_AdminWari']);
                }elseif($user->getRole()==2){
                    $user->setRoles(['ROLE_Caissier']);
                }else{
                    throw new Exception('Vous ne pouvez choisir que les roles Admin (1) et Caissier (2)');
                    //return $this->handleView($this->view([$this->message=>'Vous ne pouvez choisir que les roles Admin (1) et Caissier (2)'],Response::HTTP_UNAUTHORIZED));
                }
            }
            $user->setNombreConnexion(0);
            $user->setStatus($this->status);
            $user->setCreatedAt(new \Datetime());

            $file=$request->files->all()['imageFile'];
            if (! in_array($file->getMimeType(), array('image/jpeg','image/jpg','image/png'))){
                return $this->handleView($this->view([$this->message=>'choisissez une image'],Response::HTTP_UNAUTHORIZED));
            }

            $user->setImageFile($file);
            $user->setUser($connecte);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->handleView($this->view([$this->message=>'Utilisateur ajouté avec succes'],Response::HTTP_CREATED));
    }

    /**
    * @Route("/",name="users",methods={"GET"})
    * @Security("has_role('ROLE_AdminWari') or has_role('ROLE_SuperAdminPartenaire') or has_role('ROLE_SuperAdminWari') or has_role('ROLE_AdminPartenaire')")
    */
    public function index(UserRepository $repo)
    {
        $users=$repo->findAll();
        $user=$this->getUser();
        if($user->getRoles()[0]=='ROLE_SuperAdminWari' || $user->getRoles()[0]=='ROLE_AdminWari'){
            $userss=$repo->findAll();
            $users=[];
            for ($i=0; $i < count($userss); $i++) { 
                if(!$userss[$i]->getPartenaire()){
                    $users[]=$userss[$i];
                }
            }
        }elseif($user->getRoles()[0]=='ROLE_SuperAdminPartenaire' || $user->getRoles()[0]=='ROLE_AdminPartenaire'){
            $users=$repo->findBy(['partenaire'=>$user->getPartenaire()]);
        }
        return $this->handleView($this->view($users));
    }
    /**
    * @Route("/status/{id}", name="status",methods={"PUT"})
    * @Security("has_role('ROLE_AdminWari') or has_role('ROLE_SuperAdminPartenaire') or has_role('ROLE_SuperAdminWari') or has_role('ROLE_AdminPartenaire')")
    */
    public function status(User $user)
    {
        $connecte = $this->getUser();
        if($connecte->getRoles()[0]=='ROLE_AdminPartenaire' || $connecte->getRoles()[0]=='ROLE_SuperAdminPartenaire'){
            if(!$user || $user->getPartenaire()!=$connecte->getPartenaire() || ($connecte->getRoles()[0]=='ROLE_AdminPartenaire' && $user->getRoles()[0]=='ROLE_SuperAdminPartenaire') || $user==$connecte){
                if(!$user){
                    $msg='cet utilisateur n existe pas';
                }elseif($user->getPartenaire()!=$connecte->getPartenaire() || ($connecte->getRoles()[0]=='ROLE_AdminPartenaire' && $user->getRoles()[0]=='ROLE_SuperAdminPartenaire')){
                    $msg='Vous n avez pas l autorisation pour effectuer cette action';
                }else{
                    $msg='Vous ne pouvez pas bloquer votre compte';
                }
                throw new Exception($msg);
                //return $this->handleView($this->view(['erreur'=>$msg],Response::HTTP_UNAUTHORIZED));
            }
        }else{
            if(!$user || ($connecte->getRoles()[0]=='ROLE_AdminWari' && $user->getRoles()[0]=='ROLE_SuperAdminWari') || $user==$connecte){
                if(!$user){
                    $msg='cet utilisateur n existe pas';
                }elseif($connecte->getRoles()[0]=='ROLE_AdminWari' && $user->getRoles()[0]=='ROLE_SuperAdminWari'){
                    $msg='Vous n avez pas l autorisation pour effectuer cette action';
                }else{
                    $msg='Vous ne pouvez pas bloquer votre compte';
                }
                throw new Exception($msg);
                //return $this->handleView($this->view(['erreur'=>$msg],Response::HTTP_UNAUTHORIZED));
            }
        }
        if($user->getStatus()==$this->status){
            $user->setStatus('Bloqué');
        }else{
            $user->setStatus($this->status);
        }
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($user);
        $entityManager->flush();
        return $this->handleView($this->view([$this->message=>'ok'],Response::HTTP_CREATED));
    }
    /**
    * @Route("/password/{id}", name="password_change",methods={"PUT"})
    */
    public function initPassword(User $user,ValidatorInterface $validator,Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        $mdp= new MotDePasse();
        $form = $this->createForm(MotDePasseType::class, $mdp);
        $form->handleRequest($request);
    
        $data=json_decode($request->getContent(),true);
        $form->submit($data);
        $errors = $validator->validate($mdp);

        if (count($errors) > 0) {
            $errorsString = (string) $errors;

            return new Response($errorsString);
        }
        if($form->get($this->plain)->getData()!=$form->get($this->plain.'Confirm')->getData()){
            throw new Exception('veuillez saisir les memes mots de passe');
            //return $this->handleView($this->view([$this->message=>'veuillez saisir les memes mots de passe'],Response::HTTP_UNAUTHORIZED));
        }
        if ($form->isSubmitted() && $form->isValid()) {
            
            // encode the plain password
            $user->setPassword(
                $passwordEncoder->encodePassword(
                    $user,
                    $form->get($this->plain)->getData()
                )
            );
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
            return $this->handleView($this->view([$this->message=>'Mot de passe réinitialisé avec succès'],Response::HTTP_CREATED));
        }
    }

    /**
    * @Route("/status/partenaire/{id}", name="status_partenaire",methods={"PUT"})
    * @Security("has_role('ROLE_AdminWari') or has_role('ROLE_SuperAdminWari')")
    */
    public function statusPartenaire(Partenaire $partenaire)
    {
        if(!$partenaire){
            return $this->handleView($this->view(['erreur'=>'ce partenaire n existe pas'],Response::HTTP_UNAUTHORIZED));
        }
        if($partenaire->getStatus()==$this->status){
            $partenaire->setStatus('Bloqué');
        }else{
            $partenaire->setStatus($this->status);
        }
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($partenaire);
        $entityManager->flush();
        return $this->handleView($this->view([$this->message=>'ok'],Response::HTTP_CREATED));
    }

    /**
    * @Route("/login", name="login", methods={"POST"})
    */
    public function login(){}
    
    /**
    * @Route("/userpartenaire/{id}", name="user_parte", methods={"GET"})
    */
    public function usersPartenaire(UserRepository $userRepository,Partenaire $partenaire): Response
    {
        $users=$userRepository->findBy(['partenaire'=>$partenaire->getId()]);

        $encoders = [new JsonEncoder()]; // If no need for XmlEncoder
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);

        // Serialize your object in Json
        $jsonObject = $serializer->serialize($users, 'json', [
            'circular_reference_handler' => function ($object) {
                return $object->getId();
            }
        ]);

        // For instance, return a Response with encoded Json
        return new Response($jsonObject, 200, ['Content-Type' => 'application/json']);
    }

    /**
    * @Route("/usersysteme", name="user_systeme", methods={"GET"})
    */
    public function usersSyste(UserRepository $userRepository): Response
    {
        $usersAll=$userRepository->findAll();
        $users=[];

        for ($i=0; $i < count($usersAll); $i++) { 
            if($usersAll[$i]->getRoles()[0]=='ROLE_SuperAdminWari' || $usersAll[$i]->getRoles()[0]=='ROLE_AdminWari' || $usersAll[$i]->getRoles()[0]=='ROLE_Caissier'){
                $users=$usersAll[$i];
            }
        }
        $encoders = [new JsonEncoder()]; // If no need for XmlEncoder
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);

        // Serialize your object in Json
        $jsonObject = $serializer->serialize($users, 'json', [
            'circular_reference_handler' => function ($object) {
                return $object->getId();
            }
        ]);

        // For instance, return a Response with encoded Json
        return new Response($jsonObject, 200, ['Content-Type' => 'application/json']);
    }

    /**
    * @Route("/userconnecte", name="user_connecte", methods={"GET"})
    */
    public function usersConnecte()
    {
        $users=$this->getUser();

        $encoders = [new JsonEncoder()]; // If no need for XmlEncoder
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);

        // Serialize your object in Json
        $jsonObject = $serializer->serialize($users, 'json', [
            'circular_reference_handler' => function ($object) {
                return $object->getId();
            }
        ]);

        // For instance, return a Response with encoded Json
        return new Response($jsonObject, 200, ['Content-Type' => 'application/json']);
    }

    /**
     * @Route("/{id}/nbconnexion", name="nombre_connexion", methods={"PUT"})
     */
    public function nombreConnexion(User $user)
    {
        $user->setNombreConnexion($user->getNombreConnexion()+1);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($user);
        $entityManager->flush();
        return $this->handleView($this->view([$this->message=>'ok'],Response::HTTP_CREATED));
    }
}
