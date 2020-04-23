<?php

namespace App\Controller;

use App\Entity\Sportmeeting;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CategoryController extends AbstractController
{
    /**
     * @Route("/categorie/city={city}/categorie={categorie}", name="category")
     */
    public function index($categorie, $city)
    {

        $matchs = $this->getDoctrine()
            ->getRepository(Sportmeeting::class)
            ->findBySport($city, $categorie);

        dump($matchs);
        return $this->render('category/category.html.twig', [
            'controller_name' => 'CategoryController',
            'title' => $categorie,
            'matchs' => $matchs
        ]);
    }
}
