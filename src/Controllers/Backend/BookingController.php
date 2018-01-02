<?php

namespace Controllers\Backend;

use Entities\Travel;
use Entities\Booking;

class BookingController extends AbstractBase
{
	public function browseAction()
    {
		$em = $this->getEntityManager();

        $query = $em
            ->createQueryBuilder()
            ->select('b, t')
            ->from('Entities\Booking', 'b')
            ->leftJoin('b.travel', 't')
			->orderBy('b.id', 'DESC')
			->getQuery()
        	;
       		$bookings = $query->getResult();
	
		$this->addContext('bookings', $bookings);
	}	
}
