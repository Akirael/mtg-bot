<?php

namespace App\Repository\CardPrice;

use App\Entity\CardPrice\StarCityPrice;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method StarCityPrice|null find($id, $lockMode = null, $lockVersion = null)
 * @method StarCityPrice|null findOneBy(array $criteria, array $orderBy = null)
 * @method StarCityPrice[]    findAll()
 * @method StarCityPrice[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StarCityPriceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StarCityPrice::class);
    }

}
