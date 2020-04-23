<?php

namespace App\Controller;

use App\Entity\Team;
use App\Entity\Player;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TeamController extends AbstractController
{
    /**
     * @Route("/team/categorie={categorie}/team={team}/city={city}", name="team")
     */
    public function index($categorie, $team)
    {
        $_team = $this->getDoctrine()
            ->getRepository(Team::class)
            ->findTeambyName($team, $categorie);

        $goalkeepers = $this->getDoctrine()
            ->getRepository(Player::class)
            ->findbyPosition($team, "Gardien");

        $defenders = $this->getDoctrine()
            ->getRepository(Player::class)
            ->findbyPosition($team, "Défenseur");

        $middles = $this->getDoctrine()
            ->getRepository(Player::class)
            ->findbyPosition($team, "Milieu");

        $attakers = $this->getDoctrine()
            ->getRepository(Player::class)
            ->findbyPosition($team, "Attaquant");

        return $this->render('team/team.html.twig', [
            'controller_name' => 'TeamController',
            'team' => $_team,
            'goalkeepers' => $goalkeepers,
            'defenders' => $defenders,
            'middles' => $middles,
            'attakers' => $attakers
        ]);
    }
}
