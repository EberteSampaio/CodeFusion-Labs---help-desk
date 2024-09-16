<?php

namespace App\Repository\Category;

use App\Entity\Category;
use App\Exceptions\Category\CategoryCreationException;
use App\Exceptions\NotFoundException;
use App\Interfaces\Category\CategoryRepositoryInterface;
use App\Models\CategoryModel;
use Carbon\Carbon;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function all() : array
    {
        $categories = CategoryModel::all()->whereNull('deleted_at')->toArray();

       $listCategory = array_map(function (array $arrayCategories){

         $category = new Category(
             $arrayCategories['name'],
             $arrayCategories['description']);

         $category->setId($arrayCategories['id']);
         $category->setCreatedAt($arrayCategories['created_at']);
         $category->setUpdatedAt($arrayCategories['updated_at']);
         $category->setDeletedAt($arrayCategories['deleted_at']);

         return $category->info();

        }, $categories);

        return $listCategory;
    }

    public function insert(Category $newCategory): Category
    {
        $category = CategoryModel::create([
            'name'=> $newCategory->getName(),
            'description' => $newCategory->getDescription()
        ]);

        if(is_null($category)){
            throw new CategoryCreationException();
        }


       return $this->formatCategory($category);
    }

    public function searchById(int $id) : Category
    {
        $category = CategoryModel::find($id);

        if(is_null($category)){
            throw new NotFoundException();
        }

        return $this->formatCategory($category);
    }

    public function update(Category $oldCategory) : Category
    {
        $category = CategoryModel::find($oldCategory->getId());


        if (! $category) {
            throw new NotFoundException();
        }

        $category->update([
            'name' => $oldCategory->getName(),
            'description' => $oldCategory->getDescription(),
        ]);

        return $this->formatCategory($category);
    }
    public function deleteById(int $id) : bool
    {
        $category = CategoryModel::find($id);


        if (! $category) {
            throw new NotFoundException();
        }

        $category->update([
            'deleted_at' => Carbon::now()
        ]);

        return true;
    }

    public function formatCategory(CategoryModel $category) : Category
    {

         $createdCategory = new Category(
            $category->name,
            $category->description
        );

        $createdCategory->setId($category->id);

        $createdCategory->setAllDateAttributes(
            $category->created_at,
            $category->updated_at,
            $category->deleted_at
            );

        return $createdCategory;
    }
}
