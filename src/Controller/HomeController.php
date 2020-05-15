<?php

namespace App\Controller;

use App\Entity\Favorites;
use App\Entity\Sportmeeting;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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
        $sports = $this->getDoctrine()
            ->getRepository(Sportmeeting::class)
            ->findAllSport($city);

        $matchs = $this->getDoctrine()
            ->getRepository(Sportmeeting::class)
            ->findAllMeetingofDay($city, $date);

        return $this->render('home/homeDisplay.html.twig', [
            'controller_name' => 'HomeController',
            'sports' => $sports,
            'matchs' => $matchs,
            'favoris' => null
        ]);
    }

    /**
     * @Route("/accueil/city={city}/username={username}", name="homeDisplayConnected")
     */

    public function homeConnected($username, $city)
    {

        $date = date("Y-m-d");
        $matchs = $this->getDoctrine()
            ->getRepository(Sportmeeting::class)
            ->findAllMeetingofDay($city, $date);

        $date = date("Y-m-d");

        $sports = $this->getDoctrine()
            ->getRepository(Sportmeeting::class)
            ->findAllSport($city);

        $fav = $this->getDoctrine()
            ->getRepository(Favorites::class)
            ->findFavoritesbyUser($username);

        if ($fav) {
            foreach ($fav as $team_id) {
                $id = $team_id->getTeam()->getId();

                $sportmeetings = $this->getDoctrine()
                    ->getRepository(Sportmeeting::class)
                    ->findMeetingsofDaybyTeam($id, $city, $date);
                dump($sportmeetings);
            }
        } else {
            $sportmeetings = null;
        }
        return $this->render('home/homeDisplay.html.twig', [
            'controller_name' => 'HomeController',
            'sports' => $sports,
            'matchs' => $matchs,
            'favoris' => $sportmeetings
        ]);
    }
}
