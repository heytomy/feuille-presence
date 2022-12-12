<?php

namespace App\Entity;

use App\Repository\SignatureRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SignatureRepository::class)]
class Signature
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $signedAt = null;

    #[ORM\Column(length: 510)]
    private ?string $comment = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSignedAt(): ?\DateTimeImmutable
    {
        return $this->signedAt;
    }

    public function setSignedAt(\DateTimeImmutable $signedAt): self
    {
        $this->signedAt = $signedAt;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }
}
