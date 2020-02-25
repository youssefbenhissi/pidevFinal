<?php

namespace EtablissementBundle\Repository;
use Doctrine\ORM\EntityRepository;
use EtablissementBundle\Entity\Etablissement;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\Query;

/**
 * EtablissementRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class EtablissementRepository extends \Doctrine\ORM\EntityRepository
{
    public function findEntitiesByString($str)
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT e
                FROM EtablissementBundle:Etablissement e
                WHERE e.nom LIKE :str'
            )
            ->setParameter('str', '%'.$str.'%')
            ->getResult();
    }
    public function findEtablissementByid($id)
    {
        return $this->getEntityManager()
            ->createQuery(
                "SELECT e
                FROM EtablissementBundle:Etablissement
                e WHERE e.id =:id"
            )
            ->setParameter('id', $id)
            ->getOneOrNullResult();
    }
}
