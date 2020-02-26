<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Response;

class MapController extends AbstractController
{
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
     * @Route("/test/{city}", name = "test")
     * Undocumented function
     *
     * @return Response
     */
    public function findPlace(Request $request, $city): Response
    {
        return $this->json([
            'code' => 200,
            'message' => 'OK',
            'ville' => $city
        ], 200);
    }
}
