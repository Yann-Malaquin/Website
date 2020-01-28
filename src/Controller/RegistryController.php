<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Profil;
use App\Form\RegistrationType;
use App\Notification\MailNotification;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegistryController extends AbstractController
{
    /**
     * @Route("/inscription", name="registry")
     */
    public function registration(Request $request, EntityManagerInterface $manager, MailerInterface $mailer, MailNotification $mailnotif, UserPasswordEncoderInterface $encoder){
        
        $user = new User();
        $profil = new Profil();
        
        $form = $this->createForm(RegistrationType::class,$user);


        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $manager = $this->getDoctrine()->getManager();
            $hash = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($hash);
            $manager->persist($user);
            $mailnotif->notify($mailer, $user);
            $manager->flush();

            $profil->setEmail($user->getEmail());
            $manager->persist($profil);
            $manager->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render('registry/registry.html.twig', [
            'formRegistration' => $form->createView()
        ]);
    }
}
