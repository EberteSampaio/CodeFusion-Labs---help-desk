<?php

namespace App\Entity;

use App\Models\User;
use Carbon\Carbon;

class Comment
{
    private ?int $id;
    private string $content;
    private int $userId;
    private int $ticketId;
    private Carbon $createdAt;
    private Carbon $updatedAt;
    private Carbon $deletedAt;

    public function __construct(?int $id, string $content, int $userId, int $ticketId, Carbon $createdAt, Carbon $updatedAt, Carbon $deletedAt)
    {
        $this->setId($id);
        $this->setContent($content);
        $this->setUserId($userId);
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

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
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
