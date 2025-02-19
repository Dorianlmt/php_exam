<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Float_;

#[ORM\Entity]
class Article
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: "text")]
    private ?string $description = null;

    #[ORM\Column(type: "float")]
    private ?float $price = null;

    #[ORM\Column(type: "datetime")]
    private ?\DateTimeInterface $date_publication = null;

    #[ORM\Column(type: "integer")]
    private ?int $id_author_id = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

     // Getter et Setter pour imageUrl
     public function getImage(): ?string
     {
         return $this->image;
     }
 
     public function setImage(string $image): self
     {
         $this->image = $image;
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

     public function getDescription(): ?string
     {
        return $this->description;
     }
    
     public function setDescription(string $description): self
     {
        $this->description = $description;
        return $this;
     }

     public function getPrice(): ?float
     {
        return $this->price;
     }

     public function setPrix(float $price)
     {
        $this -> price = $price;
        return $this;
     }
}
