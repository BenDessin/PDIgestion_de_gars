<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReservationRepository::class)
 */
class Reservation
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
    private $nbre_place;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateReservation;

    /**
     * @ORM\ManyToOne(targetEntity=Billets::class, inversedBy="reservations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $billets;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbrePlace(): ?string
    {
        return $this->nbre_place;
    }

    public function setNbrePlace(string $nbre_place): self
    {
        $this->nbre_place = $nbre_place;

        return $this;
    }

    public function getDateReservation(): ?\DateTimeInterface
    {
        return $this->dateReservation;
    }

    public function setDateReservation(\DateTimeInterface $dateReservation): self
    {
        $this->dateReservation = $dateReservation;

        return $this;
    }

    public function getBillets(): ?Billets
    {
        return $this->billets;
    }

    public function setBillets(?Billets $billets): self
    {
        $this->billets = $billets;

        return $this;
    }
}
