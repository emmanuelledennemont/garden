<?php

namespace App\Repository;

use App\Entity\CultureCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CultureCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method CultureCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method CultureCategory[]    findAll()
 * @method CultureCategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CultureCategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CultureCategory::class);
    }

    // /**
    //  * @return CultureCategory[] Returns an array of CultureCategory objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CultureCategory
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
