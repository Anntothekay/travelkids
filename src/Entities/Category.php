<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="categories")
 */
class Category
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id = 0;

    /**
     * @ORM\Column(type="string", length=100, unique=true)
     */
    protected $name = '';
	
	/**
     * @ORM\OneToMany(targetEntity="Travel", mappedBy="categories")
     */
    protected $travels;

	
    use \Traits\ArrayMappable;

    public function __construct(array $data = [])
    {
        $this->mapFromArray($data);
        $this->travels = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString()
    {
        return $this->getName();
    }

    /* *** Getter and Setter *** */

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
	
	public function getTravels()
    {
        return $this->travels;
    }
	
    /* *** *** */
	
	public function clearTravels()
    {
        $this->travels->clear();
    }

    public function addTravel(Travel $travel)
    {
        $this->travels->add($travel);
    }

    public function hasTravels(Travel $travel)
    {
        return $this->travels->contains($travel);
    }

    public function removeTravels(Travel $travel)
	{
        $this->travels->removeElement($travel);
    }
}
