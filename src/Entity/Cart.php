<?php

namespace App\Entity;

use App\Repository\CartRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CartRepository::class)]
class Cart
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'carts')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $id_user = null;

    #[ORM\ManyToOne(inversedBy: 'carts')]
    #[ORM\JoinColumn(nullable: false)]
    public ?Article $id_article = null;

    #[ORM\Column(type: 'integer')]
    private int $quantity = 1; 

public function getQuantity(): int
{
    return $this->quantity;
}

public function setQuantity(int $quantity): static
{
    $this->quantity = $quantity;
    return $this;
}


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdUser(): ?User
    {
        return $this->id_user;
    }

    public function setIdUser(?User $id_user): static
    {
        $this->id_user = $id_user;
        return $this;
    }

    public function getIdArticle(): ?Article
    {
        return $this->id_article;
    }

    public function setIdArticle(?Article $id_article): static
    {
        $this->id_article = $id_article;
        return $this;
    }
}
