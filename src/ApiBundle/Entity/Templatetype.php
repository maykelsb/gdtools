<?php

namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Templatetype
 *
 * @ORM\Table(name="templatetype", indexes={@ORM\Index(name="fk_templatetype_category1_idx", columns={"category"})})
 * @ORM\Entity
 */
class Templatetype
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=45, nullable=false)
     */
    private $name;

    /**
     * @var float
     *
     * @ORM\Column(name="width", type="float", precision=10, scale=0, nullable=false)
     */
    private $width;

    /**
     * @var float
     *
     * @ORM\Column(name="height", type="float", precision=10, scale=0, nullable=false)
     */
    private $height;

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=6, nullable=false)
     */
    private $color;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \ApiBundle\Entity\Category
     *
     * @ORM\ManyToOne(targetEntity="ApiBundle\Entity\Category")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="category", referencedColumnName="id")
     * })
     */
    private $category;



    /**
     * Set name
     *
     * @param string $name
     *
     * @return Templatetype
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
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
     * Set width
     *
     * @param float $width
     *
     * @return Templatetype
     */
    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Get width
     *
     * @return float
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Set height
     *
     * @param float $height
     *
     * @return Templatetype
     */
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Get height
     *
     * @return float
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set color
     *
     * @param string $color
     *
     * @return Templatetype
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
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
     * Set category
     *
     * @param \ApiBundle\Entity\Category $category
     *
     * @return Templatetype
     */
    public function setCategory(\ApiBundle\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \ApiBundle\Entity\Category
     */
    public function getCategory()
    {
        return $this->category;
    }
}
