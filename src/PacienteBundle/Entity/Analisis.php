<?php

namespace PacienteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Paciente
 *
 * @ORM\Table(name="analisis")
 * @ORM\Entity(repositoryClass="PacienteBundle\Repository\AnalisisRepository")
 */
class Analisis
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @Assert\NotBlank
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */

    private $name;

    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="Paciente" , mappedBy="analisis")
     * @ORM\JoinTable(name="paciente_analisis")
     */
    private $pacientes=null;


    public function __construct()
    {
        $this->pacientes = new ArrayCollection();
    }
    
     public function getPacientes()
     {
        return $this->pacientes;
    }


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Categoria
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
}

