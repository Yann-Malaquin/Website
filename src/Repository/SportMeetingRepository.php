<?php

namespace App\Repository;

use App\Entity\Sportmeeting;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Sportmeeting|null find($id, $lockMode = null, $lockVersion = null)
 * @method Sportmeeting|null findOneBy(array $criteria, array $orderBy = null)
 * @method Sportmeeting[]    findAll()
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
}
