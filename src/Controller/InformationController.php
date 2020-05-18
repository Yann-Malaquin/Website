<?php

namespace App\Controller;

use App\Entity\Sportmeeting;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class InformationController extends AbstractController
{
    /**
     * @Route("/information/city={city}", name="information")
     */
    public function index($city)
    {
        $sports = $this->getDoctrine()
            ->getRepository(Sportmeeting::class)
            ->findAllSport($city);

        return $this->render('information/information.html.twig', [
            'controller_name' => 'InformationController',
            'sports' => $sports
        ]);
    }
}
