<?php


namespace EvenementBundle\Repository;

use Doctrine\ORM\EntityRepository;

class EvenementRepository extends EntityRepository
{

    public function searchReservation($data, $page = 0, $max = NULL, $getResult = true)
    {
        $qb = $this->_em->createQueryBuilder();
        $query = isset($data['query']) && $data['query']?$data['query']:null;

        $qb
            ->select('e')
            ->from('EvenementBundle:Evenement', 'e')
        ;

        if ($query){
            $qb
                ->andWhere('e.nomE like :query')
                ->setParameter('query', "%".$query."%")
            ;

        }
        $qb->orderBy('e.dateD', 'DESC');

        if ($max) {
            $preparedQuery = $qb->getQuery()
                ->setMaxResults($max)
                ->setFirstResult($page * $max)
            ;
        } else {
            $preparedQuery = $qb->getQuery();
        }

        return $getResult?$preparedQuery->getResult():$preparedQuery;
    }

}