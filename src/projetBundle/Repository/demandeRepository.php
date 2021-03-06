<?php

namespace projetBundle\Repository;

/**
 * demandeRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class demandeRepository extends \Doctrine\ORM\EntityRepository
{


    public function getDemande()
    {
        /*$em = $this->getDoctrine()->getManager();
        $RAW_QUERY = 'select r.idRealisation as id, f.nom as filmnom,a.nom as acteurnom ,f.id as idfilm from film f JOIN realisation r on r.idfilm=f.id join acteur a on r.idacteur=a.id';
        $statement = $em->getConnection()->prepare($RAW_QUERY);
        $statement->execute();
        return $statement->fetchAll();*/
        $query = $this->getEntityManager()
            ->createQuery("SELECT d.id as id, u.username as nom ,d.date_de_sortie as DateDeSortie ,d.dateDeRetour as dateDeRetour ,d.description as description , u.id as userid  ,d.etat as etat from projetBundle:demande d JOIN UserBundle:User u WITH d.parents = u.id ");
        return $query->getResult();

    }
}
