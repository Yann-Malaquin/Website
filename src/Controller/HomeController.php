<?php

namespace App\Controller;

use App\Entity\SportMeeting;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/accueil", name="home")
     */
    public function index()
    {

        $matchs = null;
        return $this->render('home/home.html.twig', [
            'controller_name' => 'HomeController',
            'matchs' => $matchs
        ]);
    }

    /**
     * @Route("/")
     */
    public function home()
    {
        $matchs = null;
        return $this->render('home/home.html.twig', [
            'controller_name' => 'HomeController',
            'matchs' => $matchs
        ]);
    }

    /**
     * @Route("/accueil/{city}", name = "homeDisplay")
     */
    public function findMeeting($city)
    {
        $date = date("Y-m-d");
        $matchs = $this->getDoctrine()
            ->getRepository(SportMeeting::class)
            ->findAllMeetingofDay($city, $date);


        return $this->render('home/homeDisplay.html.twig', [
            'controller_name' => 'HomeController',
            'matchs' => $matchs
        ]);
    }
}
