<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SportmeetingRepository")
 */
class Sportmeeting
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Infrastructure", inversedBy="sportmeetings")
     * @ORM\JoinColumn(nullable=false)
     */
    private $infrastructure;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sport;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $competition;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Team", inversedBy="sportmeeting")
     * @ORM\JoinColumn(nullable=false)
     */
    private $team_home;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Team", inversedBy="sportmeeting")
     * @ORM\JoinColumn(nullable=false)
     */
    private $team_outside;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city;

    /**
     * @ORM\Column(type="datetime")
     */
    private $meeting;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isfinish;

    /**
     * @ORM\Column(type="integer")
     */
    private $duration_meeting;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getSport(): ?string
    {
        return $this->sport;
    }

    public function setSport(string $sport): self
    {
        $this->sport = $sport;

        return $this;
    }

    public function getCompetition(): ?string
    {
        return $this->competition;
    }

    public function setCompetition(string $competition): self
    {
        $this->competition = $competition;

        return $this;
    }

    public function getTeamHome(): ?Team
    {
        return $this->team_home;
    }

    public function setTeamHome(?Team $team_home): self
    {
        $this->team_home = $team_home;

        return $this;
    }

    public function getTeamOutside(): ?Team
    {
        return $this->team_outside;
    }

    public function setTeamOutside(?Team $team_outside): self
    {
        $this->team_outside = $team_outside;

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

    public function getMeeting(): ?\DateTimeInterface
    {
        return $this->meeting;
    }

    public function setMeeting(\DateTimeInterface $meeting): self
    {
        $this->meeting = $meeting;

        return $this;
    }

    public function getIsfinish(): ?bool
    {
        return $this->isfinish;
    }

    public function setIsfinish(bool $isfinish): self
    {
        $this->isfinish = $isfinish;

        return $this;
    }

    public function getDurationMeeting(): ?int
    {
        return $this->duration_meeting;
    }

    public function setDurationMeeting(int $duration_meeting): self
    {
        $this->duration_meeting = $duration_meeting;

        return $this;
    }
}
