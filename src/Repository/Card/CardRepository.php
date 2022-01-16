<?php

namespace App\Repository\Card;

use App\Entity\Card\Card;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Card|null find($id, $lockMode = null, $lockVersion = null)
 * @method Card|null findOneBy(array $criteria, array $orderBy = null)
 * @method Card[]    findAll()
 * @method Card[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CardRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Card::class);
    }

    public function getPriceByPlatform(string $cardName, object $platform, string $lang): array
    {
        $keyNamePref = 'card.name_'.$lang;
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQueryBuilder()
            ->select('card, price')
            ->from('App\Entity\Card\Card', 'card')
            ->leftJoin(
                $platform::class,
                'price',
                \Doctrine\ORM\Query\Expr\Join::WITH,
                'card.id = price.card_id'
            )
            ->where("LOWER($keyNamePref) LIKE LOWER(:name)")
            ->setParameter('name', '%'.$cardName.'%');

        return $query->getQuery()->getResult();
    }



    // /**
    //  * @return Card[] Returns an array of Card objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Card
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
