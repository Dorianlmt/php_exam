<?php

namespace App\Entity;

use App\Repository\InvoiceRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InvoiceRepository::class)]
class Invoice
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'invoices')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $id_user = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $transaction_date = null;

    #[ORM\Column]
    private ?float $amount = null;

    #[ORM\Column(length: 255)]
    private ?string $adress_facturation = null;

    #[ORM\Column(length: 255)]
    private ?string $city_facturation = null;

    #[ORM\Column(length: 255)]
    private ?string $zip_facturation = null;

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

    public function getTransactionDate(): ?\DateTimeInterface
    {
        return $this->transaction_date;
    }

    public function setTransactionDate(\DateTimeInterface $transaction_date): static
    {
        $this->transaction_date = $transaction_date;

        return $this;
    }

    public function getAmount(): ?float
    {
        return $this->amount;
    }

    public function setAmount(float $amount): static
    {
        $this->amount = $amount;

        return $this;
    }

    public function getAdressFacturation(): ?string
    {
        return $this->adress_facturation;
    }

    public function setAdressFacturation(string $adress_facturation): static
    {
        $this->adress_facturation = $adress_facturation;

        return $this;
    }

    public function getCityFacturation(): ?string
    {
        return $this->city_facturation;
    }

    public function setCityFacturation(string $city_facturation): static
    {
        $this->city_facturation = $city_facturation;

        return $this;
    }

    public function getZipFacturation(): ?string
    {
        return $this->zip_facturation;
    }

    public function setZipFacturation(string $zip_facturation): static
    {
        $this->zip_facturation = $zip_facturation;

        return $this;
    }
}