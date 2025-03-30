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


    public function add(GaesteBuchEntity $gaesteBuchEntity){

        $manager = $this->getEntityManager();
        $manager->persist($gaesteBuchEntity);

    }
    public function flush(){
        $this->getEntityManager()->flush();
    }


    public function getPaginatedEntries(int $limit, int $page): array{
        $offset = $page > 0 ? ($page - 1) * $limit : 0;
        $entries = $this->findBy([],['createdAt' => 'DESC'],$limit,$offset);

        return $entries;
    }

}
