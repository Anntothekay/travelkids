<?php

namespace Controllers\Frontend;

use Entities\Travel;
use Webmasters\Doctrine\ORM\Util;

class IndexController extends AbstractBase
{
	public function indexAction()
    {
		$em = $this->getEntityManager();

		$now = new Util\DateTime('now');

        $randoms = $em
            ->getRepository('Entities\Travel')
            ->findRandoms(5)
        ;
		
		$counter = 0;
		
		$query = $em
            ->createQueryBuilder()
            ->select('r, t, c')
            ->from('Entities\Travel', 't')
            ->leftJoin('t.region', 'r')
            ->leftJoin('t.category', 'c')
			->where('t.start >= :now')
			->addOrderBy('t.id', 'DESC')
			->setParameter('now', $now->format('Y-m-d'))
			->getQuery();

			$travels = $query->getResult();   
		;
		
		saveTravelData($travels);
		
		$this->addContext('travels', $travels);
        $this->addContext('randoms', $randoms);
		$this->addContext('counter', $counter);
	}
	
	public function agbAction()
    {
        $this->setTemplate('agb');
	}
	
	public function impressumAction()
    {
        $this->setTemplate('impressum');
	}
	
	public function privacyAction()
    {
        $this->setTemplate('privacy');
	}
	
	public function contactAction()
    {
        $this->setTemplate('contact');
	}
}
