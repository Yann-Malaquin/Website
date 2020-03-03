<?php

namespace App\Repository;

use App\Entity\SportMeeting;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method SportMeeting|null find($id, $lockMode = null, $lockVersion = null)
 * @method SportMeeting|null findOneBy(array $criteria, array $orderBy = null)
 * @method SportMeeting[]    findAll()
 * @method SportMeeting[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SportMeetingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SportMeeting::class);
    }

    // /**
    //  * @return SportMeeting[] Returns an array of SportMeeting objects
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
    public function findOneBySomeField($value): ?SportMeeting
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
            ->select('i.latitude, i.longitude, s.sport')
            ->andWhere('i.city = :city', 'i.id = s.infrastructure', 's.day_month LIKE :date')
            ->join('s.infrastructure', 'i')
            ->setParameter('city', $city)
            ->setParameter('date', $date . '%');

        return $qb->getQuery()->getResult();
    }

    public function findAllMeetingofDay($city, $date)
    {
        $qb =  $this->createQueryBuilder('s')
            ->select('i.name, i.address, i.city, s.type, s.sport, s.team_home, s.team_outside, s.h_min, s.day_month ')
            ->andWhere('i.city = :city', 'i.id = s.infrastructure', 's.day_month LIKE :date')
            ->join('s.infrastructure', 'i')
            ->setParameter('city', $city)
            ->setParameter('date', $date . '%');

        return $qb->getQuery()->getResult();
    }
}
