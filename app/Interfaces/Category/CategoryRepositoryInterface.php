<?php

namespace App\Interfaces\Category;

use App\Entity\Category;
use App\Models\CategoryModel;

interface CategoryRepositoryInterface
{
    public function all() : array;

    public function insert(Category $category): Category;

    public function searchById(int $id) : Category;

    public function update(Category $category) : Category;

    public function deleteById(int $id) : bool;
}
