<?php
# Autor: Marek Bobrowski
namespace App\Controller;

use App\Entity\User;
use App\Form\UserRegisterType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegistrationPageController extends AbstractController
{
    public function index(Request $request, UserPasswordEncoderInterface $encoder)
    {
        $user = new User();
        $form = $this->createForm(UserRegisterType::class, $user);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $user=$form->getData();
            $user->setPassword($encoder->encodePassword($user, $user->getPassword()));
            $user->setBanned(false);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
            return $this->render('registration_page/success.html.twig', [
                'user_name'=> $user->getName()
            ]);
        }
        return $this->render('registration_page/register.html.twig', [
            'form'=>$form->createView()
        ]);
    }
}
