<?php

namespace App\Repository;

use App\Entity\TimelineEvent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TimelineEvent|null find($id, $lockMode = null, $lockVersion = null)
 * @method TimelineEvent|null findOneBy(array $criteria, array $orderBy = null)
 * @method TimelineEvent[]    findAll()
 * @method TimelineEvent[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TimelineEventRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TimelineEvent::class);
    }

    /*
    public function findBySomething($value)
    {
        return $this->createQueryBuilder('t')
            ->where('t.something = :value')->setParameter('value', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
}
