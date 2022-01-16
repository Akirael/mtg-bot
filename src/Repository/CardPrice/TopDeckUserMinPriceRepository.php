<?php

namespace App\Repository\CardPrice;

use App\Entity\CardPrice\TopDeckUserMinPrice;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TopDeckUserMinPrice|null find($id, $lockMode = null, $lockVersion = null)
 * @method TopDeckUserMinPrice|null findOneBy(array $criteria, array $orderBy = null)
 * @method TopDeckUserMinPrice[]    findAll()
 * @method TopDeckUserMinPrice[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TopDeckUserMinPriceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TopDeckUserMinPrice::class);
    }

}
