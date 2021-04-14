<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Seance
 *
 * @ORM\Table(name="seance", indexes={@ORM\Index(name="seance_activite_FK", columns={"id_activite"})})
 * @ORM\Entity
 */
class Seance
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_seance", type="datetime", nullable=false)
     */
    private $dateSeance;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dure", type="time", nullable=false)
     */
    private $dure;

    /**
     * @var int
     *
     * @ORM\Column(name="nombres_exercices", type="integer", nullable=false)
     */
    private $nombresExercices;

    /**
     * @var \Activite
     *
     * @ORM\ManyToOne(targetEntity="Activite")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_activite", referencedColumnName="id")
     * })
     */
    private $idActivite;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateSeance(): ?\DateTimeInterface
    {
        return $this->dateSeance;
    }

    public function setDateSeance(\DateTimeInterface $dateSeance): self
    {
        $this->dateSeance = $dateSeance;

        return $this;
    }

    public function getDure(): ?\DateTimeInterface
    {
        return $this->dure;
    }

    public function setDure(\DateTimeInterface $dure): self
    {
        $this->dure = $dure;

        return $this;
    }

    public function getNombresExercices(): ?int
    {
        return $this->nombresExercices;
    }

    public function setNombresExercices(int $nombresExercices): self
    {
        $this->nombresExercices = $nombresExercices;

        return $this;
    }

    public function getIdActivite(): ?Activite
    {
        return $this->idActivite;
    }

    public function setIdActivite(?Activite $idActivite): self
    {
        $this->idActivite = $idActivite;

        return $this;
    }


}
