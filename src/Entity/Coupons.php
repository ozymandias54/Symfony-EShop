<?php

namespace App\Entity;

use App\Repository\CouponsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CouponsRepository::class)]
class Coupons
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 55)]
    private ?string $code = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column]
    private ?int $discount = null;

    #[ORM\Column]
    private ?int $maxUsage = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $validity = null;

    #[ORM\Column]
    private ?bool $isValid = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createAt = null;

    #[ORM\ManyToOne(inversedBy: 'coupons')]
    private ?CouponsTypes $couponsTypes = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

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

    public function getDiscount(): ?int
    {
        return $this->discount;
    }

    public function setDiscount(int $discount): self
    {
        $this->discount = $discount;

        return $this;
    }

    public function getMaxUsage(): ?int
    {
        return $this->maxUsage;
    }

    public function setMaxUsage(int $maxUsage): self
    {
        $this->maxUsage = $maxUsage;

        return $this;
    }

    public function getValidity(): ?\DateTimeImmutable
    {
        return $this->validity;
    }

    public function setValidity(\DateTimeImmutable $validity): self
    {
        $this->validity = $validity;

        return $this;
    }

    public function isIsValid(): ?bool
    {
        return $this->isValid;
    }

    public function setIsValid(bool $isValid): self
    {
        $this->isValid = $isValid;

        return $this;
    }

    public function getCreateAt(): ?\DateTimeImmutable
    {
        return $this->createAt;
    }

    public function setCreateAt(\DateTimeImmutable $createAt): self
    {
        $this->createAt = $createAt;

        return $this;
    }

    public function getCouponsTypes(): ?CouponsTypes
    {
        return $this->couponsTypes;
    }

    public function setCouponsTypes(?CouponsTypes $couponsTypes): self
    {
        $this->couponsTypes = $couponsTypes;

        return $this;
    }
}
