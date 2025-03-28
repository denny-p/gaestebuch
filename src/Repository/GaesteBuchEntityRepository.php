<?php

namespace App\Repository;

use App\Entity\GaesteBuchEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<GaesteBuchEntity>
 */
class GaesteBuchEntityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GaesteBuchEntity::class);
    }

//    /**
//     * @return GaesteBuchEntity[] Returns an array of GaesteBuchEntity objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('g')
//            ->andWhere('g.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('g.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?GaesteBuchEntity
//    {
//        return $this->createQueryBuilder('g')
//            ->andWhere('g.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
