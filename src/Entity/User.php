<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity(
 * fields = {"email"},
 * message="Adresse mail déjà utilisé")
* @UniqueEntity(
 * fields = {"username"},
 * message="Nom d'utilisateur déjà utilisé")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Email()
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=32)
     */
    private $username;

        /**
     * @ORM\Column(type="string", length=255, nullable = true)
     * @Assert\Length(min="8", minMessage="Le mot de passe doit contenir 8 caractères minimum")
     */
    private $password;

    /**
     * @Assert\EqualTo(propertyPath="password", message="Le mot de passe est différent")
     */
    public $confirm_password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cle;

    /**
     * @ORM\Column(type="integer", options={"default":0})
     */
    private $activate;

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

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getRoles(){
        return array('ROLE_USER');
    }

    public function getSalt(){
    }

    public function eraseCredentials(){
    }

    public function getCle(): ?string
    {
        return $this->cle;
    }

    public function setCle(string $cle): self
    {
        $this->cle = $cle;

        return $this;
    }

    public function getActivate(): ?int
    {
        return $this->activate;
    }

    public function setActivate(int $activate): self
    {
        $this->activate = $activate;

        return $this;
    }
}
