<?php

namespace App\Controller;

use App\Entity\Team;
use App\Entity\Player;
use App\Entity\Favorites;
use App\Entity\Sportmeeting;
use App\Repository\TeamRepository;
use App\Repository\FavoritesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TeamController extends AbstractController
{
    /**
     * @Route("/team/categorie={categorie}/team={team}/city={city}", name="team")
     * 
     * Correspond à la page concernant les informations d'une équipe
     * On retourne les informations par poste
     */
    public function index($categorie, $team, $city)
    {
        $date = date("Y-m-d");
        $sports = $this->getDoctrine()
            ->getRepository(Sportmeeting::class)
            ->findAllSport($city);

        $_team = $this->getDoctrine()
            ->getRepository(Team::class)
            ->findTeambyName($team, $categorie);

        $players = $this->getDoctrine()
            ->getRepository(Player::class)
            ->findPlayers($team);


        return $this->render('team/team.html.twig', [
            'controller_name' => 'TeamController',
            'team' => $_team,
            'players' => $players,
            'sports' => $sports
        ]);
    }

    /**
     * Permet d'ajouter en favoris une équipe
     *
     * @Route("Team/{id}/favorite", name="team_favorite")
     * 
     * @param Team $team
     * @param ObjectManager $manager
     * @param TeamRepository $teamRepo
     * @return Response
     */
    public function favorite(Team $team, EntityManagerInterface $manager, FavoritesRepository $favoritesRepo): Response
    {
        $user = $this->getUser();

        if ($team->isFavoritedbyUser($user)) {
            $favorite = $favoritesRepo->findOneBy([
                'team' => $team,
                'user' => $user
            ]);

            $manager->remove($favorite);
            $manager->flush();

            return $this->json(
                [
                    'code' => 200,
                    'message' => 'Fav delete',
                    'id' => $team->getId()
                ],
                200
            );
        }

        $favorite = new Favorites();
        $favorite->setTeam($team)
            ->setUser($user);

        $manager->persist($favorite);
        $manager->flush();

        return $this->json(
            [
                'code' => 200,
                'message' => 'Fav add',
                'id' => $team->getId()
            ],
            200
        );
    }
}
