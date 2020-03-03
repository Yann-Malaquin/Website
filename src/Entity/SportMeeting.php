<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SportMeetingRepository")
 */
class SportMeeting
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
    private $sport;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="string")
     */
    private $h_min;

    /**
     * @ORM\Column(type="string")
     */
    private $day_month;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $team_home;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $team_outside;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Infrastructure", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $infrastructure;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getHMin(): ?string
    {
        return $this->h_min;
    }

    public function setHMin(string $h_min): self
    {
        $this->h_min = $h_min;

        return $this;
    }

    public function getDayMonth(): ?string
    {
        return $this->day_month;
    }

    public function setDayMonth(string $day_month): self
    {
        $this->day_month = $day_month;

        return $this;
    }

    public function getTeamHome(): ?string
    {
        return $this->team_home;
    }

    public function setTeamHome(string $team_home): self
    {
        $this->team_home = $team_home;

        return $this;
    }

    public function getTeamOutside(): ?string
    {
        return $this->team_outside;
    }

    public function setTeamOutside(string $team_outside): self
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

    public function getInfrastructure(): ?Infrastructure
    {
        return $this->infrastructure;
    }

    public function setInfrastructure(Infrastructure $infrastructure): self
    {
        $this->infrastructure = $infrastructure;

        return $this;
    }
}
