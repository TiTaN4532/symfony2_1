<?php

namespace MyProject\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use MyProject\MainBundle\Additional\additionalFunctions as Functions;
/**
 * MyProject\MainBundle\Entity\Category
 *
 * @ORM\Table(name="category")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Category
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=45, nullable=true)
     */
    private $name;
   
    /**
     * @var string $slug
     *
     * @ORM\Column(name="slug", type="string", length=45, nullable=true)
     */
    private $slug;



    function __toString()
    {
        return $this->getName();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
      /**
     * Set name
     *
     * @param string $name
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }
    
     /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function prePersist()
    {
        $functions = new Functions;
        $this->slug = $functions->str2url($this->name);
  
    }
}
