<?php

namespace App\Repository;

use App\Entity\News;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method News|null find($id, $lockMode = null, $lockVersion = null)
 * @method News|null findOneBy(array $criteria, array $orderBy = null)
 * @method News[]    findAll()
 * @method News[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NewsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, News::class);
    }

    # Autor: Sebastian Łyszkowski---------------------------------------------------------------------------------------
    public function findAllFrom($offset): array
    {
        $qb = $this->createQueryBuilder('p')
            ->orderBy('p.id', 'DESC')
            ->setMaxResults(10)
            ->setFirstResult($offset);
        $query = $qb->getQuery();
        return $query->execute();
    }

    public function count($id)
    {
        $qb = $this->createQueryBuilder('p');
        return $qb
            ->select('count(p.id)')
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function findByName($title, $offset): array
    {
        $qb = $this->createQueryBuilder('p')
            ->where('REGEXP(p.Title, :regexp) = true')
            ->setParameter('regexp', $title)
            ->setMaxResults(10)
            ->setFirstResult($offset);
        $query = $qb->getQuery();
        return $query->execute();
    }

    public function countName($title)
    {
        $qb = $this->createQueryBuilder('p');
        return $qb
            ->select('count(p.id)')
            ->where('REGEXP(p.Title, :regexp) = true')
            ->setParameter('regexp', $title)
            ->getQuery()
            ->getSingleScalarResult();
    }
    # ------------------------------------------------------------------------------------------------------------------

    // /**
    //  * @return News[] Returns an array of News objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('n.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?News
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
