<?php

namespace App\Entity;

use App\Repository\DeliveriesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DeliveriesRepository::class)]
class Deliveries
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 55)]
    private ?string $address = null;

    #[ORM\Column(length: 55)]
    private ?string $zipcode = null;

    #[ORM\Column(length: 65)]
    private ?string $city = null;

    #[ORM\Column]
    private ?float $price = null;

    #[ORM\Column(length: 55)]
    private ?string $state = null;

    #[ORM\ManyToOne(inversedBy: 'deliveries')]
    private ?Orders $orders = null;

    #[ORM\ManyToOne(inversedBy: 'deliveries')]
    private ?User $deliveredBy = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getZipcode(): ?string
    {
        return $this->zipcode;
    }

    public function setZipcode(string $zipcode): self
    {
        $this->zipcode = $zipcode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(string $state): self
    {
        $this->state = $state;

        return $this;
    }

    public function getOrders(): ?Orders
    {
        return $this->orders;
    }

    public function setOrders(?Orders $orders): self
    {
        $this->orders = $orders;

        return $this;
    }

    public function getDeliveredBy(): ?User
    {
        return $this->deliveredBy;
    }

    public function setDeliveredBy(?User $deliveredBy): self
    {
        $this->deliveredBy = $deliveredBy;

        return $this;
    }
}
