<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProfilRepository")
 */
class Profil
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
    private $email;

    /**
     * @ORM\Column(type="string", length=255, nullable =true)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable =true)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255, nullable =true)
     */
    private $phone;

    /**
     * @ORM\Column(type="boolean", nullable =true)
     */
    private $notificationmail;

    /**
     * @ORM\Column(type="boolean", nullable =true)
     */
    private $notificationsms;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
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

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getNotificationmail(): ?bool
    {
        return $this->notificationmail;
    }

    public function setNotificationmail(bool $notificationmail): self
    {
        $this->notificationmail = $notificationmail;

        return $this;
    }

    public function getNotificationsms(): ?bool
    {
        return $this->notificationsms;
    }

    public function setNotificationsms(bool $notificationsms): self
    {
        $this->notificationsms = $notificationsms;

        return $this;
    }
}
