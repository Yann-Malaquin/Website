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
}
