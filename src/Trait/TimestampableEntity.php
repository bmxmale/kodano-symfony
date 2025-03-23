<?php

namespace App\Trait;

use ApiPlatform\Metadata\ApiProperty;
use DateTimeImmutable;
use DateTimeInterface;
use DateTimeZone;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

trait TimestampableEntity
{
    #[ORM\Column(type: Types::DATETIME_IMMUTABLE, nullable: true)]
    #[ApiProperty(readable: false, writable: false)]
    private ?DateTimeImmutable $createdAt = null;

    #[ORM\Column(type: Types::DATETIME_IMMUTABLE, nullable: true)]
    #[ApiProperty(readable: false, writable: false)]
    private ?DateTimeInterface $updatedAt = null;

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): ?DateTimeInterface
    {
        return $this->updatedAt;
    }

    #[ORM\PreUpdate]
    #[ORM\PrePersist]
    public function setLifecycleValue(): void
    {
        if ($this->createdAt === null) {
            $this->createdAt = new DateTimeImmutable('now', new DateTimeZone('UTC'));
        }

        $this->updatedAt = new DateTimeImmutable('now', new DateTimeZone('UTC'));
    }
}
