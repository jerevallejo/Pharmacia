<?php

namespace PacienteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Paciente
 *
 * @ORM\Table(name="paciente")
 * @ORM\Entity(repositoryClass="PacienteBundle\Repository\PacienteRepository")
 */
class Paciente implements \JsonSerializable
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
     * @var string
     * @Assert\NotBlank
     * @ORM\Column(name="lastename", type="string", length=255)
     */
    private $lastename;

    /**
     * @var int
     * @Assert\NotBlank
     * @ORM\Column(name="idNumber", type="integer")
     */
    private $idNumber;

    /**
     * @var int
     * @Assert\NotBlank
     * @ORM\Column(name="idType", type="integer")
     */
    private $idType;

    /**
     * @var string
     * 
     * @ORM\Column(name="observation", type="string", length=255, nullable=true)
     */
    private $observation;

    /**
     * @var arrayColection
     *
     * @ORM\ManyToMany(targetEntity="Analisis", inversedBy="paciente")
     * @ORM\JoinTable (name="paciente_analisis")
     */
    private $analisis=null;

    public function __construct()
    {
        $this->analisis = new ArrayCollection();
    }

    /**
     * Get analisis
     *
     * @return array
     */
    public function getAnalisis()
    {
        return $this->analisis;
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
     * @return Paciente
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
     * Set lastename
     *
     * @param string $lastename
     *
     * @return Paciente
     */
    public function setLastename($lastename)
    {
        $this->lastename = $lastename;

        return $this;
    }

    /**
     * Get lastename
     *
     * @return string
     */
    public function getLastename()
    {
        return $this->lastename;
    }

    /**
     * Set idNumber
     *
     * @param integer $idNumber
     *
     * @return Paciente
     */
    public function setIdNumber($idNumber)
    {
        $this->idNumber = $idNumber;

        return $this;
    }

    /**
     * Get idNumber
     *
     * @return int
     */
    public function getIdNumber()
    {
        return $this->idNumber;
    }

    /**
     * Set idType
     *
     * @param integer $idType
     *
     * @return Paciente
     */
    public function setIdType($idType)
    {
        $this->idType = $idType;

        return $this;
    }

    /**
     * Get idType
     *
     * @return int
     */
    public function getIdType()
    {
        return $this->idType;
    }

    /**
     * Set observation
     *
     * @param string $observation
     *
     * @return Paciente
     */
    public function setObservation($observation)
    {
        $this->observation = $observation;

        return $this;
    }

    /**
     * Get observation
     *
     * @return string
     */
    public function getObservation()
    {
        return $this->observation;
    }

    public function jsonSerialize()
    {
        return [
                'id' => $this->getId(),
                'name' => $this->getName(),
                'lastename' => $this->getLastename(),
                'idNumber'=> $this->getIdNumber(),
                'idType' => $this->getIdType(),
                'obervatio  n'=>$this->getObservation()
                ];
    }

    public function __toString()
    {
        return $this->name;
    }
}

