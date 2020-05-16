<?php

namespace App\Controller;

use App\Entity\Sportmeeting;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CategoryController extends AbstractController
{
    /**
     * @Route("/categorie/city={city}/categorie={categorie}", name="category")
     * 
     * Fonction faisant office de controller pour la page des catégories
     * Retourne tous les matchs d'une catégorie
     */
    public function index($categorie, $city)
    {

        $date = date("Y-m-d");
        $sports = $this->getDoctrine()
            ->getRepository(Sportmeeting::class)
            ->findAllSport($city);

        $matchs = $this->getDoctrine()
            ->getRepository(Sportmeeting::class)
            ->findBySport($city, $categorie);

        return $this->render('category/category.html.twig', [
            'controller_name' => 'CategoryController',
            'title' => $categorie,
            'matchs' => $matchs,
            'sports' => $sports
        ]);
    }
}
