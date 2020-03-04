<?php

namespace App\Controller;

use App\Entity\SportMeeting;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CategoryController extends AbstractController
{
    /**
     * @Route("/categorie/{city}/{categorie}", name="category")
     */
    public function index($categorie, $city)
    {

        $matchs = $this->getDoctrine()
            ->getRepository(SportMeeting::class)
            ->findBySport($city, $categorie);


        return $this->render('category/category.html.twig', [
            'controller_name' => 'CategoryController',
            'title' => $categorie,
            'matchs' => $matchs
        ]);
    }
}
