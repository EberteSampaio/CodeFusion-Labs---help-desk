<?php

namespace App\Entity;

use Carbon\Carbon;

class Category
{
    private ?int $id;
    private string $name;
    private string $description;
    private string $createdAt;
    private string $updatedAt;
    private ?string $deletedAt;

    public function __construct(string $name, string $description)
    {
        $this->setName($name);
        $this->setDescription($description);
    }

    public function setAllDateAttributes(string $create, string $update, ?string $delete) : void
    {

        $this->setCreatedAt(Carbon::parse($create));
        $this->setUpdatedAt(Carbon::parse($update));
        $this->setDeletedAt((is_null($delete)) ? null : Carbon::parse($update));
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    public function setCreatedAt(string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getUpdatedAt(): string
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(string $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    public function getDeletedAt(): ?string
    {
        return $this->deletedAt;
    }

    public function setDeletedAt(?string $deletedAt): void
    {
        $this->deletedAt = $deletedAt;
    }

    public function info(): array
    {
     return [
         'id'          => $this->getId(),
         'name'        => $this->getName(),
         'description' => $this->getDescription(),
         'created_at'  => $this->getCreatedAt(),
         'updated_at'  => $this->getUpdatedAt(),
         'deleted_at'  => $this->getDeletedAt(),
     ];
    }
}
