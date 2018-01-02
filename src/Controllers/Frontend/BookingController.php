<?php

namespace Controllers\Frontend;

use Entities\Travel;
use Entities\Booking;

class BookingController extends AbstractBase
{
	public function addAction()
	{
		$em = $this->getEntityManager();
        
		$travel = $em
            ->getRepository('Entities\Travel')
            ->find((int)$_REQUEST['travel_id'])
        ;

        $travel || $this->render404();
				
        $booking = isset($_SESSION['booking_data']) ? $_SESSION['booking_data'] : new Booking();

        if ($_POST) {
			
            $booking->mapFromArray($_POST);
			
			$travel_id = isset($_POST['travel_id']) ? $_POST['travel_id'] : [];
			
			
			$validator = $em->getValidator($booking);
            if ($validator->isValid()) {
				saveBookingData($booking, $travel_id);
                $this->redirect('book', 'booking');	

            }

            $this->addContext('errors', $validator->getErrors());
        }
		
        $this->setTemplate('addAction');		

        $this->addContext('travel', $travel);
		$this->addContext('booking', $booking);
	}
	
	public function bookAction()
	{
		$em = $this->getEntityManager();
        
		$booking = isset($_SESSION['booking_data']) ? $_SESSION['booking_data'] : [];		
		$travel_id = isset($_SESSION['travel_id']) ? $_SESSION['travel_id'] : [];

		$travel = $em
            ->getRepository('Entities\Travel')
            ->find((int)$travel_id)
        ;
		
        $travel || $this->render404();
				
        if ($_POST) {
			
			$travel->addBooking($booking);
			$booking->setTravel(
                    $em->getRepository('Entities\Travel')->find((int)$travel_id)
                	);
            $em->persist($booking);
            $em->flush();

            $this->setMessage('Buchung wurde erfolgreich gesendet.');
			deleteBookingData();
            $this->setTemplate('thanks');
       	} else {
     
        	$this->setTemplate('bookAction');		

        	$this->addContext('travel', $travel);
			$this->addContext('booking', $booking);
		}
	}	
}
