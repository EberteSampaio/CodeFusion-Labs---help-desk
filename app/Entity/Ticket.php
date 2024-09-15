<?php

namespace App\Entity;

use Carbon\Carbon;

class Ticket
{
    private ?int $id;
    private string $title;
    private string $description;
    private string $status;
    private int $userId;
    private int $responsibleUserId;
    private Carbon $createdAt;
    private Carbon $updatedAt;
    private Carbon $deletedAt;

    public function __construct(?int $id, string $title, string $description, string $status, int $userId, int $responsibleUserId, Carbon $createdAt, Carbon $updatedAt, Carbon $deletedAt)
    {
        $this->setId($id);
        $this->setTitle($title);
        $this->setDescription($description);
        $this->setStatus($status);
        $this->setUserId($userId);
        $this->setResponsibleUserId($responsibleUserId);
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

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    public function getResponsibleUserId(): int
    {
        return $this->responsibleUserId;
    }

    public function setResponsibleUserId(int $responsibleUserId): void
    {
        $this->responsibleUserId = $responsibleUserId;
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
