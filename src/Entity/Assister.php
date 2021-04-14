<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Assister
 *
 * @ORM\Table(name="assister", indexes={@ORM\Index(name="assister_seance0_FK", columns={"id_seance"}), @ORM\Index(name="id_user", columns={"id_user"})})
 * @ORM\Entity
 */
class Assister
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
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     * })
     */
    private $idUser;

    /**
     * @var \Seance
     *
     * @ORM\ManyToOne(targetEntity="Seance")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_seance", referencedColumnName="id")
     * })
     */
    private $idSeance;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdUser(): ?User
    {
        return $this->idUser;
    }

    public function setIdUser(?User $idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }

    public function getIdSeance(): ?Seance
    {
        return $this->idSeance;
    }

    public function setIdSeance(?Seance $idSeance): self
    {
        $this->idSeance = $idSeance;

        return $this;
    }


}
