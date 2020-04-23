<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\InfrastructureRepository")
 */
class Infrastructure
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $address;

    /**
     * @ORM\Column(type="float")
     */
    private $latitude;

    /**
     * @ORM\Column(type="float")
     */
    private $longitude;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Sportmeeting", mappedBy="infrastructure")
     */
    private $sportmeetings;


    public function __construct()
    {
        $this->sportmeetings = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    public function setLatitude(float $latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    public function setLongitude(float $longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return Collection|Sportmeeting[]
     */
    public function getSportmeetings(): Collection
    {
        return $this->sportmeetings;
    }

    public function addSportmeeting(Sportmeeting $sportmeeting): self
    {
        if (!$this->sportmeetings->contains($sportmeeting)) {
            $this->sportmeetings[] = $sportmeeting;
            $sportmeeting->setInfrastructure($this);
        }

        return $this;
    }

    public function removeSportmeeting(Sportmeeting $sportmeeting): self
    {
        if ($this->sportmeetings->contains($sportmeeting)) {
            $this->sportmeetings->removeElement($sportmeeting);
            // set the owning side to null (unless already changed)
            if ($sportmeeting->getInfrastructure() === $this) {
                $sportmeeting->setInfrastructure(null);
            }
        }

        return $this;
    }
}
