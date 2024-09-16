<?php

namespace App\Interfaces\Category;

use App\Entity\Category;

interface CategoryServiceInterface
{
    public function all(): array;

    public function create(string $name, string $description) : Category;

    public function update(int $id, string $name, string $description): Category;

    public function delete(int $id) : void;
    public function showById(int $id) : Category;
}
