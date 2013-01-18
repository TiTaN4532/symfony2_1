<?php

namespace MyProject\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use MyProject\MainBundle\Additional\additionalFunctions as Functions;

/**
 * MyProject\MainBundle\Entity\Images
 *
 * @ORM\Table()
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Images
{
   
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;
     /**
     * @var string $file
     *
     * @ORM\Column(name="file", type="string", length=255)
     */
    private $file;

    /**
     * @var $product_id
     *
     * @ORM\ManyToOne(targetEntity="Products", inversedBy="images")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     *
     */
    private $product_id;
    
     /**
     * Set product
     *
     * @param Products $product
     */
    public function setProductId(Products $product)
    {
        $this->product_id = $product;
        return $this;
    }

    /**
     * Get product_id
     *
     * @return Products
     */
    public function getProductId()
    {
        return $this->product_id;
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
     * Set file
     *
     * @param string $file
     */
    public function setFile($file)
    {
        $this->file = $file;
    }

    /**
     * Get file
     *
     * @return string 
     */
    public function getFile()
    {
        return $this->file;
    }

  
     public function __toString()
    {
        return $this->getName();
    }
     public function getAbsolutePath()
    {
        return null === $this->name
            ? null
            : $this->getUploadRootDir().'/'.$this->name;
    }
     public function getWebPath()
    {
        return null === $this->name
            ? null
            : $this->getUploadDir().'/'.$this->name;
    }

    public function getUploadRootDir()
    {
        // the absolute directory path where uploaded
        // documents should be saved
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return 'uploads/images';
    }
    /**
     * @ORM\PreUpdate()
     */
    public function preUpdate()
    {

        $functions=new Functions;

            $k=0;
            $ext=substr(strrchr($this->getName(), '.'), 1);
           
            $filename=$functions->str2url($this->getProductId()->getCategory()->getName()).'_'.$functions->str2url($this->getProductId()->getName());
            print $this->getUploadRootDir().'/'.$filename.'.'.$ext;
            if(is_file($this->getUploadRootDir().'/'.$filename.'.'.$ext))
            {
                $k++;
                while(is_file($this->getUploadRootDir().'/'.$filename.'_'.$k.'.'.$ext))
                {
                    $k++;
                }
                $filename=$filename.'_'.$k.'.'.$ext;
            }
            else
                $filename.='.'.$ext;

                 rename($this->getAbsolutePath(),$this->getUploadRootDir().'/'.$filename);
            $this->setName($filename);
        }
 
     /**
     * @ORM\PrePersist()
     * 
     */
    public function prePersist()
    {

       if (null !== $this->file) {
          // do whatever you want to generate a unique name
       $this->name = time().'.'.$this->file->guessExtension();
       }
     }
    /**
     * @ORM\PostPersist()
     */
    public function upload()
    { 
        if (null === $this->file) {
            return;
        }
          if(is_object($this->file))
       {  
        // if there is an error when moving the file, an exception will
        // be automatically thrown by move(). This will properly prevent
        // the entity from being persisted to the database on error
        $this->file->move($this->getUploadRootDir(), $this->name);

        unset($this->file);
       }
        
    }
     /**
     * @ORM\PostRemove()
     */
    public function removeUpload()
    {
        if ($file = $this->getAbsolutePath()) {
            unlink($file);
        }
    }
    
    
  
    
}
