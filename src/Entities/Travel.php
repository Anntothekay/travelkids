<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Webmasters\Doctrine\ORM\Util;

/**
 * @ORM\Entity(repositoryClass="Repositories\TravelRepository")
 * @ORM\Table(name="travels")
 */
class Travel
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id = 0;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $title = '';

	 /**
     * @ORM\Column(type="date")
     */
    protected $start;
	
	 /**
     * @ORM\Column(type="date")
     */
    protected $end;
	
	 /**
     * @ORM\Column(type="integer")
     */
    protected $price = 0;	
	
    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $teaser = '';

    /**
     * @ORM\Column(type="text")
     */
    protected $description = '';

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $pictures = '';

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $thumbnail = '';	
	
    /**
     * @ORM\ManyToOne(targetEntity="Region", inversedBy="travels")
     */
    protected $region;

	/**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="travels")
     */
    protected $category;
	
	/**
     * @ORM\OneToMany (targetEntity="Booking", mappedBy="travels")
     */
    protected $bookings;
		
	 /**
     * @ORM\Column(name="created_at", type="datetime")
     * @Gedmo\Timestampable(on="create")
     */
    protected $createdAt;

	
    use \Traits\ArrayMappable;

    public function __construct(array $data = [])
    {
        $this->mapFromArray($data);
        $this->bookings = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /* *** Getter and Setter *** */

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }
	
    public function setTitle($title)
    {
        $this->title = $title;
    }
	
    public function getStart()
    {
        return new Util\DateTime($this->start);
    }
	
    public function setStart($start)
    {	
	        if (empty($start)) {
            $start = 'now';
        }
		
        $this->start = new Util\DateTime($start);
  	}
	
	public function getEnd()
    {
        return new Util\DateTime($this->end);
    }
	
    public function setEnd($end)
    {	
	        if (empty($end)) {
            $end = 'now';
        }
		
        $this->end = new Util\DateTime($end);
  	}
	
    public function getPrice()
    {
        return $this->price;
    }		
	
    public function setPrice($price)
    {
        $this->price = $price;
    }
	
    public function getTeaser()
    {
        return $this->teaser;
    }

    public function setTeaser($teaser)
    {
        $this->teaser = $teaser;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getPictures()
    {
        return $this->pictures;
    }

    public function setPictures($pictures)
    {
        $this->pictures = implode(",", $pictures);
    }	
	
    public function getThumbnail()
    {
        return $this->thumbnail;
    }

    public function setThumbnail($thumbnail)
    {
        $this->thumbnail = $thumbnail;
    }	
	
    public function getRegion()
    {
        return $this->region;
    }

    public function setRegion($region)
    {
        $this->region = $region;
    }
	
	public function getCategory()
    {
        return $this->category;
    }

    public function setCategory($category)
    {
        $this->category = $category;
    }

    public function getBookings()
    {
        return $this->bookings;
    }
	
    public function clearBookings()
    {
        $this->bookings->clear();
    }

    public function addBooking(Booking $booking)
    {
        $this->bookings->add($booking);
    }

    public function hasTag(Booking $booking)
    {
        return $this->bookings->contains($booking);
    }

    public function removeTag(Booking $booking)
    {
        $this->bookings->removeElement($booking);
    }
	
	public function getCreatedAt()
    {
        return new Util\DateTime($this->createdAt);
    }
}
