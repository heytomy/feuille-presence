<?php

namespace App\Entity;

use App\Repository\DrawRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DrawRepository::class)]
class Draw
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $toSearchAt = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $searchedAt = null;

    #[ORM\Column(nullable: true)]
    private ?int $stepNumber = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updatedAt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getToSearchAt(): ?\DateTimeImmutable
    {
        return $this->toSearchAt;
    }

    public function setToSearchAt(\DateTimeImmutable $toSearchAt): self
    {
        $this->toSearchAt = $toSearchAt;

        return $this;
    }

    public function getSearchedAt(): ?\DateTimeImmutable
    {
        return $this->searchedAt;
    }

    public function setSearchedAt(\DateTimeImmutable $searchedAt): self
    {
        $this->searchedAt = $searchedAt;

        return $this;
    }

    public function getStepNumber(): ?int
    {
        return $this->stepNumber;
    }

    public function setStepNumber(?int $stepNumber): self
    {
        $this->stepNumber = $stepNumber;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
