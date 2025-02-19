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
    private ?string $nom = null;

    #[ORM\Column(type: "text")]
    private ?string $description = null;

    #[ORM\Column(type: "float")]
    private ?float $prix = null;

    #[ORM\Column(type: "datetime")]
    private ?\DateTimeInterface $date_publication = null;

    #[ORM\Column(type: "integer")]
    private ?int $auteur_id = null;

    #[ORM\Column(length: 255)]
    private ?string $imageUrl = null;

     // Getter et Setter pour imageUrl
     public function getImageUrl(): ?string
     {
         return $this->imageUrl;
     }
 
     public function setImageUrl(string $imageUrl): self
     {
         $this->imageUrl = $imageUrl;
         return $this;
     }

     public function getNom(): ?string
     {
         return $this->nom;
     }
 
     public function setNom(string $nom): self
     {
         $this->nom = $nom;
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

     public function getPrix(): ?float
     {
        return $this->prix;
     }

     public function setPrix(float $prix)
     {
        $this -> prix = $prix;
        return $this;
     }
}
