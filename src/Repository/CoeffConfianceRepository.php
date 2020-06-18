<?php

namespace App\Repository;

use App\Entity\CoeffConfiance;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CoeffConfiance|null find($id, $lockMode = null, $lockVersion = null)
 * @method CoeffConfiance|null findOneBy(array $criteria, array $orderBy = null)
 * @method CoeffConfiance[]    findAll()
 * @method CoeffConfiance[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CoeffConfianceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CoeffConfiance::class);
    }

    // /**
    //  * @return CoeffConfiance[] Returns an array of CoeffConfiance objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CoeffConfiance
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
