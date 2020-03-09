<?php

namespace App\Entity;

use Doctrine\DBAL\Types\DateTimeTzType;
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
     * @ORM\Column(type="datetimetz")
     */
    private $meeting;

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
     * @ORM\ManyToOne(targetEntity="App\Entity\Infrastructure", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $infrastructure;

    /**
     * @ORM\Column(type="boolean", options={"default" : 0})
     */
    private $finish;

    /**
     * @ORM\Column(type="integer", options={"default" : 0})
     */
    private $durationMeeting;

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

    public function getMeeting(): ?DateTimeTzType
    {
        return $this->meeting;
    }


    public function setMeeting(DateTimeTzType $h_min): self
    {
        $this->meeting = $meeting;

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

    public function getFinish(): ?bool
    {
        return $this->finish;
    }

    public function setFinish(bool $finish): self
    {
        $this->finish = $finish;

        return $this;
    }

    public function getDurationMeeting(): ?int
    {
        return $this->durationMeeting;
    }

    public function setDurationMeeting(int $durationMeeting): self
    {
        $this->durationMeeting = $durationMeeting;

        return $this;
    }
}
