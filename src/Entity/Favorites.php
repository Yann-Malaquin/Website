<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FavoritesRepository")
 */
class Favorites
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\user", inversedBy="favorites")
     */
    private $user_id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\team", inversedBy="favorites")
     */
    private $team_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): ?user
    {
        return $this->user_id;
    }

    public function setUserId(?user $user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getTeamId(): ?team
    {
        return $this->team_id;
    }

    public function setTeamId(?team $team_id): self
    {
        $this->team_id = $team_id;

        return $this;
    }
}
