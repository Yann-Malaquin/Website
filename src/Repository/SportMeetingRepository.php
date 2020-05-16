<?php

namespace App\Repository;

use Doctrine\ORM\Query;
use App\Entity\Sportmeeting;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method Sportmeeting|null find($id, $lockMode = null, $lockVersion = null)
 * @method Sportmeeting|null findOneBy(array $criteria, array $orderBy = null)
 * @method Sportmeeting[]    findAll()how to retu
 * @method Sportmeeting[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SportmeetingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Sportmeeting::class);
    }

    // /**
    //  * @return Sportmeeting[] Returns an array of Sportmeeting objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Sportmeeting
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    /**
     * Permet de trouver toutes les infrastructure d'une ville et du jours(utile pour la carte)
     *
     * @param  $city
     * @param  $date
     */
    public function findAllLocation($city, $date)
    {
        $qb =  $this->createQueryBuilder('s')
            ->select('i.id,i.latitude, i.longitude, s.sport, i.name, i.address, i.city')
            ->andWhere('i.city = :city', 'i.id = s.infrastructure', 's.meeting LIKE :date')
            ->join('s.infrastructure', 'i')
            ->distinct(true)
            ->setParameter('city', $city)
            ->setParameter('date', $date . '%');

        return $qb->getQuery()->getResult();
    }


    /**
     * Trouve les événements du jour et d'une ville
     *
     * @param $city
     * @param  $date
     */
    public function findAllMeetingofDay($city, $date)
    {
        $qb =  $this->createQueryBuilder('s')
            ->select('s')
            ->orderBy('s.meeting', 'ASC')
            ->andWhere('i.city = :city', 'i.id = s.infrastructure', 'h.id = s.team_home', 'o.id = s.team_outside', 's.meeting LIKE :date')
            ->join('s.infrastructure', 'i')
            ->join('s.team_home', 'h')
            ->join('s.team_outside', 'o')
            ->setParameter('city', $city)
            ->setParameter('date', $date . '%');

        return $qb->getQuery()->getResult();
    }

    /**
     * Trouve tous les sports en rapport avec une ville (pour les catégories)
     *
     * @param  $city
     */
    public function findAllSport($city)
    {
        $qb =  $this->createQueryBuilder('s')
            ->select('s.sport')
            ->distinct(true)
            ->orderBy('s.meeting', 'DESC')
            ->andWhere('i.city = :city', 'i.id = s.infrastructure', 'h.id = s.team_home', 'o.id = s.team_outside')
            ->join('s.infrastructure', 'i')
            ->join('s.team_home', 'h')
            ->join('s.team_outside', 'o')
            ->setParameter('city', $city);

        return $qb->getQuery()->getResult();
    }

    /**
     * Trouve les événements grâce au sport(notamment lors du clique sur la catégorie)
     *
     * @param  $city
     * @param $sport
     */
    public function findBySport($city, $sport)
    {
        $qb =  $this->createQueryBuilder('s')
            ->select('s')
            ->orderBy('s.meeting', 'ASC')
            ->andWhere('i.city = :city', 'i.id = s.infrastructure', 'h.id = s.team_home', 'o.id = s.team_outside', 's.sport = :sport')
            ->join('s.infrastructure', 'i')
            ->join('s.team_home', 'h')
            ->join('s.team_outside', 'o')
            ->setParameter('city', $city)
            ->setParameter('sport', $sport);

        return $qb->getQuery()->getResult();
    }

    /**
     * Retrouve les événements grâce à l'id d'une équipe (lorsque l'on recherche avec les favoris)
     *
     * @param  $team_id
     */
    public function findMeetingsbyTeam($team_id)
    {

        $qb =  $this->createQueryBuilder('s')
            ->select('s')
            ->andWhere('h.id = :team_id')
            ->orWhere('o.id = :team_id')
            ->orderBy('s.meeting', 'ASC')
            ->join('s.team_home', 'h')
            ->join('s.team_outside', 'o')
            ->setParameter('team_id', $team_id);

        return $qb->getQuery()->getResult();
    }

    /**
     * Trouve les événements du jour d'une équipe
     *
     * @param  $team_id
     * @param  $city
     * @param  $date
     */
    public function findMeetingsofDaybyTeam($team_id, $city, $date)
    {

        $qb =  $this->createQueryBuilder('s')
            ->select('s')
            ->andWhere('i.city = :city', 'i.id = s.infrastructure', 'h.id = :team_id', 's.meeting LIKE :date')
            ->orderBy('s.meeting', 'ASC')
            ->join('s.team_home', 'h')
            ->join('s.infrastructure', 'i')
            ->setParameter('team_id', $team_id)
            ->setParameter('city', $city)
            ->setParameter('date', $date . '%');

        return $qb->getQuery()->getResult();
    }

    /**
     * Retrouver le sport d'une équipe grâce à son ID
     *
     * @param  $team_id
     */
    public function findSportbyTeam($team_id)
    {
        $qb =  $this->createQueryBuilder('s')
            ->select('s.sport')
            ->distinct(true)
            ->andWhere('h.id = :team_id')
            ->orWhere('o.id = :team_id')
            ->orderBy('s.sport', 'ASC')
            ->join('s.team_home', 'h')
            ->join('s.team_outside', 'o')
            ->setParameter('team_id', $team_id);

        return $qb->getQuery()->getResult();
    }

    /**
     * Retrouver les événements grâce au nom d'utilisateur (pour les favoris)
     *
     * @param  $username
     */
    public function findMeetingbyUsername($username)
    {
        $qb =  $this->createQueryBuilder('s')
            ->select('s.sport')
            ->distinct(true)
            ->andWhere('h.id = :team_id')
            ->orWhere('o.id = :team_id')
            ->orderBy('s.sport', 'ASC')
            ->join('s.team_home', 'h')
            ->join('s.team_outside', 'o')
            ->setParameter('username', $username);

        return $qb->getQuery()->getResult();
    }
}
