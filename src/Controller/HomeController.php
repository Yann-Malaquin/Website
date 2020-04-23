<?php

namespace App\Controller;

use App\Entity\Sportmeeting;
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
            'controller_name' => 'HomeController'
        ]);
    }

    /**
     * @Route("/", name = "index")
     */
    public function home()
    {
        $matchs = null;
        return $this->render('home/home.html.twig', [
            'controller_name' => 'HomeController'
        ]);
    }

    /**
     * @Route("/accueil/city={city}", name = "homeDisplay")
     */
    public function findMeeting($city)
    {
        $date = date("Y-m-d");
        $matchs = $this->getDoctrine()
            ->getRepository(Sportmeeting::class)
            ->findAllMeetingofDay($city, $date);

        return $this->render('home/homeDisplay.html.twig', [
            'controller_name' => 'HomeController',
            'matchs' => $matchs
        ]);
    }
}
