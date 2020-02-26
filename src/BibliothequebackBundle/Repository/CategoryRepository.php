<?php

namespace BibliothequebackBundle\Repository;

/**
 * CategoryRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CategoryRepository extends \Doctrine\ORM\EntityRepository
{
    public function findEntitiesByString($str)
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT c
                FROM BibliothequebackBundle:Category c
                WHERE c.libelle LIKE :str'
            )
            ->setParameter('str', '%'.$str.'%')
            ->getResult();
    }
}
