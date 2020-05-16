<?php

namespace App\Entity;

use App\Entity\User;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

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
     * @ORM\OneToMany(targetEntity="App\Entity\Sportmeeting", mappedBy="team_home")
     */
    private $sportmeeting;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Favorites", mappedBy="team")
     */
    private $favorites;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $abbreviation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $president_name;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Infrastructure", cascade={"persist", "remove"})
     */
    private $infrastructure;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $trainer;

    public function __construct()
    {
        $this->sportmeeting = new ArrayCollection();
        $this->favorites = new ArrayCollection();
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
     * @return Collection|Sportmeeting[]
     */
    public function getSportmeeting(): Collection
    {
        return $this->sportmeeting;
    }

    public function addSportmeeting(Sportmeeting $sportmeeting): self
    {
        if (!$this->sportmeeting->contains($sportmeeting)) {
            $this->sportmeeting[] = $sportmeeting;
            $sportmeeting->setTeamHome($this);
        }

        return $this;
    }

    public function removeSportmeeting(Sportmeeting $sportmeeting): self
    {
        if ($this->sportmeeting->contains($sportmeeting)) {
            $this->sportmeeting->removeElement($sportmeeting);
            // set the owning side to null (unless already changed)
            if ($sportmeeting->getTeamHome() === $this) {
                $sportmeeting->setTeamHome(null);
            }
        }

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
            $favorite->setTeam($this);
        }

        return $this;
    }

    public function removeFavorite(Favorites $favorite): self
    {
        if ($this->favorites->contains($favorite)) {
            $this->favorites->removeElement($favorite);
            // set the owning side to null (unless already changed)
            if ($favorite->getTeam() === $this) {
                $favorite->setTeam(null);
            }
        }

        return $this;
    }

    public function getAbbreviation(): ?string
    {
        return $this->abbreviation;
    }

    public function setAbbreviation(string $abbreviation): self
    {
        $this->abbreviation = $abbreviation;

        return $this;
    }

    public function getPresidentName(): ?string
    {
        return $this->president_name;
    }

    public function setPresidentName(string $president_name): self
    {
        $this->president_name = $president_name;

        return $this;
    }

    public function getInfrastructure(): ?Infrastructure
    {
        return $this->infrastructure;
    }

    public function setInfrastructure(?Infrastructure $infrastructure): self
    {
        $this->infrastructure = $infrastructure;

        return $this;
    }

    public function getTrainer(): ?string
    {
        return $this->trainer;
    }

    public function setTrainer(string $trainer): self
    {
        $this->trainer = $trainer;

        return $this;
    }

    /**
     * Permet de savoir si l'équipe est en favoris d'un utilisateur
     *
     * @param User $user
     * @return boolean
     */
    public function isFavoritedbyUser(User $user): bool
    {
        foreach ($this->favorites as $favorite) {
            if ($favorite->getUser() === $user) return true;
        }
        return false;
    }
}
