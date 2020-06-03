<?php

namespace App\Controller;

use App\Entity\Favorites;
use App\Entity\Profil;
use App\Entity\Sportmeeting;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class FavoritesController extends AbstractController
{
    /**
     * @Route("/favorites/city={city}/username={username}", name="favorites")
     * 
     * Fonction faisant office de controller pour les favoris
     * Elle retourne tous les événements en rapport avec la ou les équipes favorisée(s)
     */
    public function index($username, $city)
    {
        $user = $this->getDoctrine()
            ->getRepository(Profil::class)
            ->findUserbyUsername($username);


        $fav = $this->getDoctrine()
            ->getRepository(Favorites::class)
            ->findFavoritesbyUser($username);

        $date = date("Y-m-d");
        $sports = $this->getDoctrine()
            ->getRepository(Sportmeeting::class)
            ->findAllSport($city);
        if ($fav) {
            foreach ($fav as $team_id) {
                $id = $team_id->getTeam()->getId();

                $sportmeetings = $this->getDoctrine()
                    ->getRepository(Sportmeeting::class)
                    ->findMeetingsbyTeam($id);

                $sportsTeam = $this->getDoctrine()
                    ->getRepository(Sportmeeting::class)
                    ->findSportbyTeam($id);
            }
        } else {
            $sportmeetings = null;
            $sportsTeam = null;
        }

        return $this->render('favorites/favorites.html.twig', [
            'controller_name' => 'FavoritesController',
            'user' => $user,
            'teams' => $fav,
            'meetings' => $sportmeetings,
            'sportTeam' => $sportsTeam,
            'sports' => $sports
        ]);
    }
}
