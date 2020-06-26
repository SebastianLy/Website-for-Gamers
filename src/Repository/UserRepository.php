<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    # Autor: Sebastian Łyszkowski---------------------------------------------------------------------------------------
    public function findAllFrom($offset): array
    {
        $qb = $this->createQueryBuilder('p')
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

    public function findByName($name, $offset): array
    {
        $qb = $this->createQueryBuilder('p')
            ->where('REGEXP(p.name, :regexp) = true')
            ->setParameter('regexp', $name)
            ->setMaxResults(10)
            ->setFirstResult($offset);
        $query = $qb->getQuery();
        return $query->execute();
    }

    public function countName($name)
    {
        $qb = $this->createQueryBuilder('p');
        return $qb
            ->select('count(p.id)')
            ->where('REGEXP(p.name, :regexp) = true')
            ->setParameter('regexp', $name)
            ->getQuery()
            ->getSingleScalarResult();
    }
    # ------------------------------------------------------------------------------------------------------------------

    // /**
    //  * @return User[] Returns an array of User objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?User
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
