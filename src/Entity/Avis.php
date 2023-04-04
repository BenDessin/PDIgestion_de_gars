<?php

namespace App\Entity;

use App\Repository\AvisRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AvisRepository::class)
 */
class Avis
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $commentaire;

    /**
     * @ORM\Column(type="date")
     */
    private $dateCommente;

    /**
     * @ORM\ManyToOne(targetEntity=Voyages::class, inversedBy="avis")
     * @ORM\JoinColumn(nullable=false)
     */
    private $voyages;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(string $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    public function getDateCommente(): ?\DateTimeInterface
    {
        return $this->dateCommente;
    }

    public function setDateCommente(\DateTimeInterface $dateCommente): self
    {
        $this->dateCommente = $dateCommente;

        return $this;
    }

    public function getVoyages(): ?Voyages
    {
        return $this->voyages;
    }

    public function setVoyages(?Voyages $voyages): self
    {
        $this->voyages = $voyages;

        return $this;
    }
}
