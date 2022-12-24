<?php

namespace App\Entity;

use App\Repository\ArrivalsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArrivalsRepository::class)]
class Arrivals
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createAt = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $closeAt = null;

    #[ORM\Column]
    private ?bool $isClosed = null;

    #[ORM\OneToMany(mappedBy: 'arrivals', targetEntity: ArrivalsDetails::class)]
    private Collection $arrivalsDetails;

    public function __construct()
    {
        $this->arrivalsDetails = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getCloseAt(): ?\DateTimeImmutable
    {
        return $this->closeAt;
    }

    public function setCloseAt(\DateTimeImmutable $closeAt): self
    {
        $this->closeAt = $closeAt;

        return $this;
    }

    public function isIsClosed(): ?bool
    {
        return $this->isClosed;
    }

    public function setIsClosed(bool $isClosed): self
    {
        $this->isClosed = $isClosed;

        return $this;
    }

    /**
     * @return Collection<int, ArrivalsDetails>
     */
    public function getArrivalsDetails(): Collection
    {
        return $this->arrivalsDetails;
    }

    public function addArrivalsDetail(ArrivalsDetails $arrivalsDetail): self
    {
        if (!$this->arrivalsDetails->contains($arrivalsDetail)) {
            $this->arrivalsDetails->add($arrivalsDetail);
            $arrivalsDetail->setArrivals($this);
        }

        return $this;
    }

    public function removeArrivalsDetail(ArrivalsDetails $arrivalsDetail): self
    {
        if ($this->arrivalsDetails->removeElement($arrivalsDetail)) {
            // set the owning side to null (unless already changed)
            if ($arrivalsDetail->getArrivals() === $this) {
                $arrivalsDetail->setArrivals(null);
            }
        }

        return $this;
    }
}
