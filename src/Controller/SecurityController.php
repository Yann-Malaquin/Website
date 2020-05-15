<?php

namespace App\Controller;

use App\Entity\Sportmeeting;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{

    public function __construct(UserRepository $urepository)
    {
        $this->urepository = $urepository;
    }

    /**
     * @Route("/login/city={city}", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils, $city): Response
    {
        $date = date("Y-m-d");
        $sports = $this->getDoctrine()
            ->getRepository(Sportmeeting::class)
            ->findAllSport($city);
        if ($this->getUser()) {
            $user = $this->getUser();
            return $this->redirectToRoute('homeDisplayConnected', ['city' => $city, 'username' => $user->getUsername()]);
        }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
            'sports' => $sports
        ]);
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logout()
    {
        return $this->redirectToRoute('homeDisplay');
    }

    /**
     * @Route("/activation/log={username}&cle={cle}", name="activation")
     */
    public function activation(EntityManagerInterface $manager, $username, $cle)
    {

        $user = $this->urepository->findOneBy(['username' => $username]);

        if ($user->getActivate() != '1') {
            if ($user->getCle() == $cle) {
                $user->setActivate(1);
                $manager->flush();
            }
        }

        return $this->render('security/activation.html.twig', [
            'activation' => $user->getActivate()
        ]);
    }
}
