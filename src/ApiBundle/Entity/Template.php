<?php

namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Template
 *
 * @ORM\Table(name="template", indexes={@ORM\Index(name="fk_template_project1_idx", columns={"project"}), @ORM\Index(name="fk_template_templatetype1_idx", columns={"templatetype"})})
 * @ORM\Entity
 */
class Template
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=45, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=true)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \ApiBundle\Entity\Templatetype
     *
     * @ORM\ManyToOne(targetEntity="ApiBundle\Entity\Templatetype")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="templatetype", referencedColumnName="id")
     * })
     */
    private $templatetype;

    /**
     * @var \ApiBundle\Entity\Project
     *
     * @ORM\ManyToOne(targetEntity="ApiBundle\Entity\Project")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="project", referencedColumnName="id")
     * })
     */
    private $project;



    /**
     * Set name
     *
     * @param string $name
     *
     * @return Template
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
     * Set description
     *
     * @param string $description
     *
     * @return Template
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
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
     * Set templatetype
     *
     * @param \ApiBundle\Entity\Templatetype $templatetype
     *
     * @return Template
     */
    public function setTemplatetype(\ApiBundle\Entity\Templatetype $templatetype = null)
    {
        $this->templatetype = $templatetype;

        return $this;
    }

    /**
     * Get templatetype
     *
     * @return \ApiBundle\Entity\Templatetype
     */
    public function getTemplatetype()
    {
        return $this->templatetype;
    }

    /**
     * Set project
     *
     * @param \ApiBundle\Entity\Project $project
     *
     * @return Template
     */
    public function setProject(\ApiBundle\Entity\Project $project = null)
    {
        $this->project = $project;

        return $this;
    }

    /**
     * Get project
     *
     * @return \ApiBundle\Entity\Project
     */
    public function getProject()
    {
        return $this->project;
    }
}
