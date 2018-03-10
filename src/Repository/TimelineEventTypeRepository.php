<?php

namespace App\Repository;

use App\Entity\TimelineEventType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TimelineEventType|null find($id, $lockMode = null, $lockVersion = null)
 * @method TimelineEventType|null findOneBy(array $criteria, array $orderBy = null)
 * @method TimelineEventType[]    findAll()
 * @method TimelineEventType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TimelineEventTypeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TimelineEventType::class);
    }
}
