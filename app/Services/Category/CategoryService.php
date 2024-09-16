<?php

namespace App\Services\Category;

use App\Entity\Category;
use App\Interfaces\Category\CategoryRepositoryInterface;
use App\Interfaces\Category\CategoryServiceInterface;
use Carbon\Carbon;

class CategoryService implements CategoryServiceInterface
{
    private CategoryRepositoryInterface $repository;
    public function __construct(CategoryRepositoryInterface $repository)
    {
        $this->setRepository($repository);
    }


    public function all(): array
    {
        return $this->getRepository()->all();
    }

    public function create(string $name, string $description) : Category
    {
        $category = $this->getRepository()->insert(new Category($name,$description));

        return $category;
    }

    public function update(int $id, ?string $name, ?string $description): Category
    {
        $category = $this->getRepository()->searchById($id);

        if(is_null($name) and is_null($description)){
            throw new \InvalidArgumentException();
        }

        if(! is_null($name)) {
            $category->setName($name);
        }

        if(! is_null($description)) {
            $category->setDescription($description);
        }

        $category->setUpdatedAt(Carbon::now());

        return $this->repository->update($category);
    }

    public function delete(int $id): void
    {
        if(!$this->getRepository()->deleteById($id)){
            throw new \Exception('Could not delete in the selected category.',500);
        }
    }

    public function showById(int $id): Category
    {
        return $this->getRepository()->searchById($id);
    }

    public function getRepository(): CategoryRepositoryInterface
    {
        return $this->repository;
    }

    public function setRepository(CategoryRepositoryInterface $repository): void
    {
        $this->repository = $repository;
    }

}
