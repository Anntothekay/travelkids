<?php

namespace Controllers\Frontend;

use Entities\Travel;
use Webmasters\Doctrine\ORM\Util;

class TravelController extends AbstractBase
{	
	public function browseAction()
    {
		$em = $this->getEntityManager();

		$now = new Util\DateTime('now');
		
		$search = isset($_GET['search']) ? $_GET['search'] : '';
		
		$categories = $em
			->getRepository('Entities\Category')
			->findAll()
		;			
	    $categories = array_map(function($category) {return $category->getName();}, $categories);
		
		$category = isset($_GET['category']) ? $_GET['category'] : 'Reisen';
		if (!(in_array(ucfirst($category), $categories))) {
			$category = 'Reisen';
		};	
		
        $query = $em
            ->createQueryBuilder()
            ->select('r, t, c')
            ->from('Entities\Travel', 't')
            ->leftJoin('t.region', 'r')
            ->leftJoin('t.category', 'c')
			->where('t.start >= :now')
			->andWhere('t.title LIKE :search OR t.teaser LIKE :search OR t.description LIKE :search OR r.name LIKE :search OR c.name LIKE :search')
			->addOrderBy('t.id', 'DESC')
			->setParameter('now', $now->format('Y-m-d'))
		    ->setParameter('search', '%' . $search . '%');
			
			if ((in_array(ucfirst($category), $categories))) {
				 $query = $query->andWhere('c.name = :category')
				->setParameter('category', $category)			
				->getQuery()
				;
				$travels = $query->getResult();
			} else {
				$query = $query->getQuery()
				;
				$travels = $query->getResult();   
			};				
				
		$this->addContext('travels', $travels);
		$this->addContext('category', $category);
        $this->addContext('search', $search);
	}

	public function readAction()
    {
        $em = $this->getEntityManager();
        $travel = $em
            ->getRepository('Entities\Travel')
            ->find((int)$_GET['id'])
        ;

        $travel || $this->render404();

        $this->addContext('travel', $travel);
    }    
}
