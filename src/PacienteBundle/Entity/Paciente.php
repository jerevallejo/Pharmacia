<?php

namespace PacienteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Paciente
 *
 * @ORM\Table(name="paciente")
 * @ORM\Entity(repositoryClass="PacienteBundle\Repository\PacienteRepository")
 */
class Paciente
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
     * @var string
     *
     * @Assert\NotBlank
     * @ORM\Column(name="lastname", type="string", length=255, unique=true)
     */
    private $lastname;

     /**
     * @var int
     *
     * @ORM\Column(name="age", type="integer")
     */
    private $age;

    /**
     * @var int
     *
     * @ORM\Column(name="phone", type="integer")
     */
    private $idNumber;
    
    /**
     * @var string
     *
     * @ORM\Column(name="dni", type="integer")
     */
    private $idType;

    /**
     * @var int
     *
     * @ORM\Column(name="observation", type="string")
     */
    private $observation;
    


    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="Analisis" , inversedBy="pacientes")
     * @ORM\JoinTable(name="paciente_analisis")
     */
    private $analisis=null;


    public function __construct()
    {
        $this->analisis = new ArrayCollection();
    }

    public function getAnalisis(){
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
     * @return string
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
     * Set lastname
     *
     * @param string $lastname
     *
     * @return lastname
     */
    public function setLastName($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastname;
    }

    /**
     * Set age
     *
     * @param string $age
     *
     * @return age
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return Age
     */
    public function getAge()
    {
        return $this->age;
    }
    /**
     * Set idNumber
     *
     * @param string $idNumber
     *
     * @return idNumber
     */
    public function setIdNumber($idNumber)
    {
        $this->idNumber = $idNumber;

        return $this;
    }

    /**
     * Get idNumber
     *
     * @return idNumber
     */
    public function getIdNumber()
    {
        return $this->idNumber;
    }

    /**
     * Set idType
     *
     * @param int $idType
     *
     * @return idType
     */
    public function setIdType($idType)
    {
        $this->idType = $idType;

        return $this;
    }

    /**
     * Get idType
     *
     * @return idType
     */
    public function getIdType()
    {
        return $this->idType;
    }

    /**
     * Set observation
     *
     * @param atring $observation
     *
     * @return observation
     */
    public function setObservation($observation)
    {
        $this->observation = $observation;

        return $this;
    }

    /**
     * Get observation
     *
     * @return observation
     */
    public function getObservation()
    {
        return $this->observation;
    }
    
    
}


