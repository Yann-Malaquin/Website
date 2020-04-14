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
     * @ORM\ManyToOne(targetEntity="App\Entity\infrastructure", inversedBy="sportmeetings")
     */
    private $infrastructure_id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sport;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\team", inversedBy="sportmeetings")
     */
    private $id_team_home;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\team", inversedBy="sportmeetings")
     */
    private $id_team_outside;

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
    private $finish;

    /**
     * @ORM\Column(type="integer")
     */
    private $duration_meeting;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInfrastructureId(): ?infrastructure
    {
        return $this->infrastructure_id;
    }

    public function setInfrastructureId(?infrastructure $infrastructure_id): self
    {
        $this->infrastructure_id = $infrastructure_id;

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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getIdTeamHome(): ?team
    {
        return $this->id_team_home;
    }

    public function setIdTeamHome(?team $id_team_home): self
    {
        $this->id_team_home = $id_team_home;

        return $this;
    }

    public function getIdTeamOutside(): ?team
    {
        return $this->id_team_outside;
    }

    public function setIdTeamOutside(?team $id_team_outside): self
    {
        $this->id_team_outside = $id_team_outside;

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
        return $this->duration_meeting;
    }

    public function setDurationMeeting(int $duration_meeting): self
    {
        $this->duration_meeting = $duration_meeting;

        return $this;
    }
}
