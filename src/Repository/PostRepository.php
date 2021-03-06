<?php

namespace App\Repository;

use App\Entity\Post;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Post|null find($id, $lockMode = null, $lockVersion = null)
 * @method Post|null findOneBy(array $criteria, array $orderBy = null)
 * @method Post[]    findAll()
 * @method Post[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PostRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry) {
        parent::__construct($registry, Post::class);
    }

    /**
     * @return Post[]
     */
    public function findForHomepage() {
        return $this->createQueryBuilder('p')
                    ->where('p.enabled = :value')->setParameter('value', true)
                    ->orderBy('p.posted', 'DESC')
                    ->getQuery()
                    ->getResult();
    }

    /**
     * @param string $slug
     * @return Post
     */
    public function findBySlug(string $slug) {
        return $this->findOneBy(['slug' => $slug]);
    }
}
