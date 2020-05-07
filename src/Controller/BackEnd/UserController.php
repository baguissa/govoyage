<?php

namespace App\Controller\BackEnd;

use App\Entity\User;
use App\Form\UserRegisterType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserController extends AbstractController
{

    private $em;
    private $passwordEncoder;
    public function __construct(ObjectManager $em, UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
        $this->em =$em;
    }

    /**
     * @Route("/register", name="app.register")
     */
    public function register(Request $request)
    {
        $user = new User();
        $form = $this->createForm(UserRegisterType::class, $user);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $user->setState('ACTIVED');
            $encoded = $this->passwordEncoder->encodePassword($user, $user->getPassword());
            $user->setPassword($encoded);
            $roles = explode(',', $request->request->get('user_register')['roles'][0]);
            $user->setRoles($roles);
            $this->em->persist($user);
            $this->em->flush();
            $this->addFlash("success","Compte utilisateur crée avec succès !");
            return $this->redirectToRoute('app.login');
        }
        return $this->render('security/register.html.twig', [
            'title' => 'Creation de compte',
            'form' => $form->createView()
         ]);
    }
}
