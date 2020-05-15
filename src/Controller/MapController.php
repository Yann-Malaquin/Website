<?php

namespace App\Controller;


use App\Entity\Infrastructure;
use App\Entity\SportMeeting;
use App\Repository\InfrastructureRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MapController extends AbstractController
{


    public function __construct(InfrastructureRepository $infraRepo)
    {
        $this->infraRepo = $infraRepo;
    }

    /**
     * Permet d'afficher la page "map"
     *
     * @Route("/map/city={city}", name="map")
     * @return void
     */
    public function indexCity($city)
    {
        $date = date("Y-m-d");
        $sports = $this->getDoctrine()
            ->getRepository(Sportmeeting::class)
            ->findAllSport($city);

        return $this->render('map/map.html.twig', [
            'controller_name' => 'MapController',
            'sports' => $sports
        ]);
    }

    /**
     * @Route ("/map" , name="map/")
     */
    public function index()
    {
        $date = date("Y-m-d");
        $sports = $this->getDoctrine()
            ->getRepository(Sportmeeting::class)
            ->findAllSport($city);

        return $this->render('map/map.html.twig', [
            'controller_name' => 'MapController',
            'sports' => $sports
        ]);
    }

    /**
     * @Route("/map/{city}")
     */
    public function findPlace(Request $request, $city)
    {
        $date = date("Y-m-d");
        $place = $this->getDoctrine()
            ->getRepository(SportMeeting::class)
            ->findAllLocation($city, $date);

        return $this->json($place);
    }
}
