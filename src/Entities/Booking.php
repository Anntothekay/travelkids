<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Webmasters\Doctrine\ORM\Util;

/**
 * @ORM\Entity
 * @ORM\Table(name="bookings")
 */
class Booking
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id = 0;

	 /**
     * @ORM\Column(type="integer")
     */
    protected $people = 1;
	
	/**
     * @ORM\Column(name="booking_date", type="datetime")
	 * @Gedmo\Timestampable(on="create")
     */
    protected $bookingDate;

    /**
     * @ORM\Column(name="form_of_address", type="string", length=4)
     */
    protected $formOfAddress= '';	
	
    /**
     * @ORM\Column(name="first_name", type="string", length=100)
     */
    protected $firstName = '';
	
    /**
     * @ORM\Column(name="last_name", type="string", length=100)
     */
    protected $lastName = '';
	
	/**
     * @ORM\Column(type="date")
     */
    protected $birthdate;

    /**
     * @ORM\Column(name="street_name", type="string", length=100)
     */
    protected $streetName = '';

    /**
     * @ORM\Column(name="street_number", type="string", length=10)
     */
    protected $streetNumber = '';

    /**
     * @ORM\Column(name="postal_code", type="string", length=5)
     */
    protected $postalCode = '';	
	
    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $city = '';
	
    /**
     * @ORM\Column(type="string", length=20)
     */
    protected $phone = '';
	
    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $email = '';	
	
    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $comment = '';	
	
    /**
     * @ORM\ManyToOne(targetEntity="Travel", inversedBy="bookings")
     */
    protected $travel;


    use \Traits\ArrayMappable;

    public function __construct(array $data = [])
    {
        $this->mapFromArray($data);
    }

    /* *** Getter and Setter *** */

    public function getId()
    {
        return $this->id;
    }

    public function getPeople()
    {
        return $this->people;
    }
	
    public function setPeople($people)
    {
        $this->people = $people;
    }
	
    public function getBookingDate()
    {
        return new Util\DateTime($this->bookingDate);
    }		
	
    public function getFormOfAddress()
    {
        return $this->formOfAddress;
    }		
	
    public function setFormOfAddress($formOfAddress)
    {
        $this->formOfAddress = $formOfAddress;
    }
	
    public function getFirstName()
    {
        return $this->firstName;
    }
	
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }
	
    public function getLastName()
    {
        return $this->lastName;
    }
	
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    public function getBirthdate()
    {
        return new Util\DateTime($this->birthdate);
    }
	
    public function setBirthdate($birthdate)
    {	
	        if (empty($birthdate)) {
            $birthdate = 'now';
        }
		
        $this->birthdate = new Util\DateTime($birthdate);
  	}

    public function getStreetName()
    {
        return $this->streetName;
    }

    public function setStreetName($streetName)
    {
        $this->streetName = $streetName;
    }

	public function getStreetNumber()
    {
        return $this->streetNumber;
    }

    public function setStreetNumber($streetNumber)
    {
        $this->streetNumber = $streetNumber;
    }
	
	public function getPostalCode()
    {
        return $this->postalCode;
    }

    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;
    }
	
	public function getCity()
    {
        return $this->city;
    }

    public function setCity($city)
    {
        $this->city = $city;
    }
	
	public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }
	
	public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }
	
    public function getComment()
    {
        return $this->comment;
    }
	
    public function setComment($comment)
    {
        $this->comment = $comment;
    }	
	
	public function getTravel()
    {
        return $this->travel;
    }

    public function setTravel($travel)
    {
        $this->travel = $travel;
    }	
}
