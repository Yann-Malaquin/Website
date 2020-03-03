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
     * @Route("/map", name="map")
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {
        $defaultData = null;
        $form = $this->createFormBuilder($defaultData)
            ->add('city')
            ->getForm();

        $form->handleRequest($request);

        if ($request->getMethod() == 'POST') {
            $test = $form->getData();
            dump($test['city']);
        }

        return $this->render('map/map.html.twig', [
            'formtest' => $form->createView(),
            'controller_name' => 'MapController',
        ]);
    }


    /**
     * @Route("/map/{city}")
     */
    public function findPlace(Request $request, $city)
    {

        $date = date("Y-m-d");
        $products = $this->getDoctrine()
            ->getRepository(SportMeeting::class)
            ->findAllLocation($city, $date);

        return $this->json($products);
    }
}
