<?php

namespace PacienteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * borarr
 *
 * @ORM\Table(name="borarr")
 * @ORM\Entity(repositoryClass="PacienteBundle\Repository\borarrRepository")
 */
class borarr
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
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}

