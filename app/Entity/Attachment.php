<?php

namespace App\Entity;

use Carbon\Carbon;

class Attachment
{
    private ?int $id;
    private string $filePath;
    private int $ticketId;
    private Carbon $createdAt;
    private Carbon $updatedAt;
    private Carbon $deletedAt;

    public function __construct(?int $id, string $filePath, int $ticketId, Carbon $createdAt, Carbon $updatedAt, Carbon $deletedAt)
    {
        $this->setId($id);
        $this->setFilePath($filePath);
        $this->setTicketId($ticketId);
        $this->setCreatedAt($createdAt);
        $this->setUpdatedAt($updatedAt);
        $this->setDeletedAt($deletedAt);
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getFilePath(): string
    {
        return $this->filePath;
    }

    public function setFilePath(string $filePath): void
    {
        $this->filePath = $filePath;
    }

    public function getTicketId(): int
    {
        return $this->ticketId;
    }

    public function setTicketId(int $ticketId): void
    {
        $this->ticketId = $ticketId;
    }

    public function getCreatedAt(): Carbon
    {
        return $this->createdAt;
    }

    public function setCreatedAt(Carbon $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getUpdatedAt(): Carbon
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(Carbon $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    public function getDeletedAt(): Carbon
    {
        return $this->deletedAt;
    }

    public function setDeletedAt(Carbon $deletedAt): void
    {
        $this->deletedAt = $deletedAt;
    }


}
