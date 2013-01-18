<?php

namespace MyProject\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MyProject\MainBundle\Entity\Order
 *
 * @ORM\Table(name="orders")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Order
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
     * @var string $pay
     *
     * @ORM\Column(name="pay", type="string", length=45, nullable=true)
     */
    private $pay;
    
    /**
     * @var string $adress
     *
     * @ORM\Column(name="adress", type="string", length=45, nullable=false)
     */
    private $adress;
    
    /**
     * @var string $tel
     *
     * @ORM\Column(name="tel", type="string", length=45, nullable=false)
     */
    private $tel;
    
    /**
     * @var string $email
     *
     * @ORM\Column(name="email", type="string", length=45, nullable=true)
     */
    private $email;
   
     /**
     * @ORM\ManyToMany(targetEntity="Products")
     * @ORM\JoinTable(name="orders_products",
     *      joinColumns={@ORM\JoinColumn(name="order_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="articul", referencedColumnName="articul")}
     *      )
     */
    private $articuls;
    
     /**
     * @var integer $createdAt
     *
     * @ORM\Column(name="created_at", type="integer", nullable=true)
     */
    private $createdAt;

    /**
     * @var integer $updatedAt
     *
     * @ORM\Column(name="updated_at", type="integer", nullable=true)
     */
    private $updatedAt;

      public function __construct() {
        $this->articuls = new \Doctrine\Common\Collections\ArrayCollection();
    }

//    function __toString()
//    {
//        return $this->getId();
//    }

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
     * Set pay
     *
     * @param string $pay
     */
    public function setPay($pay)
    {
        $this->pay = $pay;
    }

    /**
     * Get pay
     *
     * @return string
     */
    public function getPay()
    {
        return $this->pay;
    }
      /**
     * Set Adress
     *
     * @param string $adress
     */
    public function setAdress($adress)
    {
        $this->adress = $adress;
    }

    /**
     * Get Adress
     *
     * @return string
     */
    public function getAdress()
    {
        return $this->adress;
    }
     /**
     * Set Tel
     *
     * @param string $tel
     */
    public function setTel($tel)
    {
        $this->tel = $tel;
    }

    /**
     * Get Tel
     *
     * @return string
     */
    public function getTel()
    {
        return $this->tel;
    }
     /**
     * Set Email
     *
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Get Email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }
    
     /**
     * Set createdAt
     *
     * @ORM\PrePersist()
     */
    public function setCreatedAt()
    {
        $this->createdAt = time();
    }

    /**
     * Get createdAt
     *
     * @return integer
     */
    public function getCreatedAt()
    {

        return date("H:i:s Y-m-d",$this->createdAt);
    }
    
    /**
     * Set updatedAt
     *
     * @ORM\PreUpdate()
     * @ORM\PrePersist()
     */
    public function setUpdatedAt()
    {
        $this->updatedAt = time();
    }

    /**
     * Get updatedAt
     *
     * @return integer
     */
    public function getUpdatedAt()
    {
        return date("H:i:s Y-m-d",$this->updatedAt);
    }
    
      /**
     * Set Articuls
     *
     * @param Products $products
     */
    public function setCategory(Products $products)
    {
        $this->articuls = $products;
    }

    /**
     * Get Articuls
     *
     * @return Articuls
     */
    public function getArticuls()
    {
        return $this->articuls;
    }
}
