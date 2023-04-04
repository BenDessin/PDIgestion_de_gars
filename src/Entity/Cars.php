<?php

namespace App\Entity;

use App\Repository\CarsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CarsRepository::class)
 */
class Cars
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
    private $matricul;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbrplaces;

    /**
     * @ORM\Column(type="integer")
     */
    private $numcars;

    /**
     * @ORM\ManyToOne(targetEntity=Cathegorie::class, inversedBy="cars")
     * @ORM\JoinColumn(nullable=false)
     */
    private $cathegorie;

    /**
     * @ORM\ManyToMany(targetEntity=Voyages::class)
     */
    private $voyages;

    /**
     * @ORM\ManyToMany(targetEntity=Clients::class, mappedBy="cars")
     */
    private $clients;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    public function __construct()
    {
        $this->voyages = new ArrayCollection();
        $this->clients = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMatricul(): ?string
    {
        return $this->matricul;
    }

    public function setMatricul(string $matricul): self
    {
        $this->matricul = $matricul;

        return $this;
    }

    public function getNbrplaces(): ?int
    {
        return $this->nbrplaces;
    }

    public function setNbrplaces(int $nbrplaces): self
    {
        $this->nbrplaces = $nbrplaces;

        return $this;
    }

    public function getNumcars(): ?int
    {
        return $this->numcars;
    }

    public function setNumcars(int $numcars): self
    {
        $this->numcars = $numcars;

        return $this;
    }

    public function getCathegorie(): ?Cathegorie
    {
        return $this->cathegorie;
    }

    public function setCathegorie(?Cathegorie $cathegorie): self
    {
        $this->cathegorie = $cathegorie;

        return $this;
    }

    /**
     * @return Collection|Voyages[]
     */
    public function getVoyages(): Collection
    {
        return $this->voyages;
    }

    public function addVoyage(Voyages $voyage): self
    {
        if (!$this->voyages->contains($voyage)) {
            $this->voyages[] = $voyage;
        }

        return $this;
    }

    public function removeVoyage(Voyages $voyage): self
    {
        $this->voyages->removeElement($voyage);

        return $this;
    }

    /**
     * @return Collection|Clients[]
     */
    public function getClients(): Collection
    {
        return $this->clients;
    }

    public function addClient(Clients $client): self
    {
        if (!$this->clients->contains($client)) {
            $this->clients[] = $client;
            $client->addCar($this);
        }

        return $this;
    }

    public function removeClient(Clients $client): self
    {
        if ($this->clients->removeElement($client)) {
            $client->removeCar($this);
        }

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }
}
