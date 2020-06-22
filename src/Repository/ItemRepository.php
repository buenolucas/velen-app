<?php
// src/Repository/ItemRepository.php
namespace App\Repository;

use App\Entity\Item;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ItemRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Item::class);
    }
    /**
     * @return Item[]
     */
    public function allItems(): array
    {
        $entityManager = $this->getEntityManager();
        $query = $entityManager->createQuery(
            'SELECT p
            FROM App\Entity\Item p
            ORDER BY p.name ASC'
        );

        // returns an array of Product objects
        return $query->getResult();
    }
    /**
     * @return Item[]
     */
    public function findByClass($class): array
    {
        $entityManager = $this->getEntityManager();
        $query = $entityManager->createQuery(
            'SELECT p
            FROM App\Entity\Item p
            WHERE p.class > :class
            ORDER BY p.name ASC'
        )->setParameter('class', $class);

        // returns an array of Product objects
        return $query->getResult();
    }
}