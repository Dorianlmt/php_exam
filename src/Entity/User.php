<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Article {
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private int $id;

    #[ORM\Column(type: "string")]
    private string $name;

    #[ORM\Column(type: "text")]
    private string $description;

    #[ORM\Column(type: "float")]
    private float $price;

    #[ORM\Column(type: "datetime")]
    private \DateTimeInterface $publishedAt;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(nullable: false)]
    private User $author;

    #[ORM\Column(type: "string")]
    private string $image;
}
