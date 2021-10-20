<?php

namespace App\Repository;

use App\Entity\Categoriee;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Categoriee|null find($id, $lockMode = null, $lockVersion = null)
 * @method Categoriee|null findOneBy(array $criteria, array $orderBy = null)
 * @method Categoriee[]    findAll()
 * @method Categoriee[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategorieeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Categoriee::class);
    }

    // /**
    //  * @return Categoriee[] Returns an array of Categoriee objects
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
    public function findOneBySomeField($value): ?Categoriee
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
