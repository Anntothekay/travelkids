<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id = 0;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    protected $name = '';

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $password = '';


    use \Traits\ArrayMappable;

    public function __construct(array $data = [])
    {
        $this->mapFromArray($data);
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

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }
}
