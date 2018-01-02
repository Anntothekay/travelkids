<?php

namespace Repositories;

use Doctrine\ORM\EntityRepository;
use Webmasters\Doctrine\ORM\Util;

class TravelRepository extends EntityRepository
{
    public function findRandoms($max = 5)
    {
		
		$now = new Util\DateTime('now');

        $em = $this->getEntityManager();
        $config = $em->getConfiguration();
        $config->addCustomNumericFunction(
            'RAND',
            '\Webmasters\Doctrine\ORM\Query\RandFunction'
        );

        $query = $em
            ->createQueryBuilder()
            ->select('r, t, c, RAND() AS rnd')
            ->from('Entities\Travel', 't')
			->where('t.start >= :now')
            ->leftJoin('t.region', 'r')
            ->leftJoin('t.category', 'c')
			->orderBy('rnd')
            ->setMaxResults($max)
			->setParameter('now', $now->format('Y-m-d'))
            ->getQuery()
        ;
        $result = $query->getResult();

        // Noetig wegen der speziellen Schreibweise von RAND()
        return array_column($result, 0);
    }
	
	/*public function findCurrentTravels()
    {
        $now = new Util\DateTime('now');
		
		$em = $this->getEntityManager();
		
        $query = $em
            ->createQueryBuilder()
            ->select('r, t, c')
            ->from('Entities\Travel', 't')
            ->leftJoin('t.region', 'r')
            ->leftJoin('t.category', 'c')
			->where('t.start >= :now')
			->addOrderBy('t.id', 'DESC')
			->setParameter('now', $now->format('Y-m-d'));
			
		$query = $query->getQuery();
		return $query->getResult();   		
	}*/
}