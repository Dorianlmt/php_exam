<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User implements PasswordAuthenticatedUserInterface, UserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180)]
    private ?string $username = null; // Correction : en minuscule

    #[ORM\Column(length: 1000)]
    private ?string $password = null; // Correction : augmenter la taille pour stocker un hash sécurisé

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column]
    private ?float $solde = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $imageProfile = null;

    #[ORM\Column(type: 'json')]
    private array $roles = [];

    public function __construct()
    {
        $this->articles = new ArrayCollection();
        $this->carts = new ArrayCollection();
        $this->invoices = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): static
    {
        $this->username = $username;
        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;
        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;
        return $this;
    }

    public function getSolde(): ?float
    {
        return $this->solde;
    }

    public function setSolde(float $solde): static
    {
        $this->solde = $solde;
        return $this;
    }

    public function getImageProfile(): ?string
    {
        return $this->imageProfile;
    }

    public function setImageProfile(?string $imageProfile): static
    {
        $this->imageProfile = $imageProfile;
        return $this;
    }

    // public function getRoles(): array
    // {
    //     return $this->roles;
    // }
    public function getRoles(): array
    {
        $roles = $this->roles;
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): static
    {
        $this->roles = $roles;
        return $this;
    }

    // 🔹 Méthodes obligatoires pour UserInterface
    public function eraseCredentials(): void
    {
        // Cette méthode est utilisée par Symfony pour nettoyer les infos sensibles
    }

    public function getUserIdentifier(): string
    {
        return $this->email; // Symfony attend un identifiant unique
    }
}
