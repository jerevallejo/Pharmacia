<?php

namespace PacienteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Analisis
 *
 * @ORM\Table(name="analisis")
 * @ORM\Entity(repositoryClass="PacienteBundle\Repository\AnalisisRepository")
 */
class Analisis implements \JsonSerializable
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
     * @Assert\NotBlank
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var arrayColection
     *
     * @ORM\ManyToMany(targetEntity="Paciente", mappedBy="analisis")
     * @ORM\JoinTable (name="paciente_analisis")
     */
    private $pacientes=null;

    public function __construct()
    {
        $this->pacientes = new ArrayCollection();
    }

    /**
     * Get pacientes
     *
     * @return array
     */
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
     * @return Analisis
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

    public function jsonSerialize()
    {
        return [
                'id' => $this->getId(),
                'name' => $this->getName()
                ];
    }

    public function __toString()
    {
        return $this->name;
    }

}

