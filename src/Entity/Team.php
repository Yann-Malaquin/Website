<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TeamRepository")
 */
class Team
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
    private $sport;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $logo;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Favorites", mappedBy="team_id")
     */
    private $favorites;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Sportmeeting", mappedBy="id_team_home")
     */
    private $sportmeetings;

    public function __construct()
    {
        $this->favorites = new ArrayCollection();
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

    public function getSport(): ?string
    {
        return $this->sport;
    }

    public function setSport(string $sport): self
    {
        $this->sport = $sport;

        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(?string $logo): self
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * @return Collection|Favorites[]
     */
    public function getFavorites(): Collection
    {
        return $this->favorites;
    }

    public function addFavorite(Favorites $favorite): self
    {
        if (!$this->favorites->contains($favorite)) {
            $this->favorites[] = $favorite;
            $favorite->setTeamId($this);
        }

        return $this;
    }

    public function removeFavorite(Favorites $favorite): self
    {
        if ($this->favorites->contains($favorite)) {
            $this->favorites->removeElement($favorite);
            // set the owning side to null (unless already changed)
            if ($favorite->getTeamId() === $this) {
                $favorite->setTeamId(null);
            }
        }

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
            $sportmeeting->setIdTeamHome($this);
        }

        return $this;
    }

    public function removeSportmeeting(Sportmeeting $sportmeeting): self
    {
        if ($this->sportmeetings->contains($sportmeeting)) {
            $this->sportmeetings->removeElement($sportmeeting);
            // set the owning side to null (unless already changed)
            if ($sportmeeting->getIdTeamHome() === $this) {
                $sportmeeting->setIdTeamHome(null);
            }
        }

        return $this;
    }
}
