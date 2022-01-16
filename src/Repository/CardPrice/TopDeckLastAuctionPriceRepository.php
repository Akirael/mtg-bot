<?php

namespace App\Repository\CardPrice;

use App\Entity\CardPrice\TopDeckLastAuctionPrice;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TopDeckLastAuctionPrice|null find($id, $lockMode = null, $lockVersion = null)
 * @method TopDeckLastAuctionPrice|null findOneBy(array $criteria, array $orderBy = null)
 * @method TopDeckLastAuctionPrice[]    findAll()
 * @method TopDeckLastAuctionPrice[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TopDeckLastAuctionPriceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TopDeckLastAuctionPrice::class);
    }

}
