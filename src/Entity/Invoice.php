<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Invoice
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(nullable: false)]
    private User $user;

    #[ORM\Column(type: 'datetime')]
    private \DateTimeInterface $transactionDate;

    #[ORM\Column(type: 'float')]
    private float $amount;

    #[ORM\Column(type: 'string')]
    private string $billingAddress;

    #[ORM\Column(type: 'string')]
    private string $billingCity;

    #[ORM\Column(type: 'string')]
    private string $billingZip;
}
