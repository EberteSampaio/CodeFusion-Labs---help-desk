<?php

namespace App\Http\Controllers\Category;

use App\Exceptions\Category\CategoryCreationException;
use App\Exceptions\NotFoundException;
use App\Interfaces\Category\CategoryServiceInterface;
use App\Services\Category\CategoryService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Psr\Container\NotFoundExceptionInterface;
use function Termwind\render;

class CategoryController extends Controller
{
    private CategoryServiceInterface $service;

    public function __construct(CategoryServiceInterface $service)
    {
        $this->setService($service);
    }


    public function index()
    {
        $categories = $this->getService()->all();

        return response()->json(['categories' => $categories], 200);
    }

    public function store(Request $request) : JsonResponse
    {
        DB::beginTransaction();

        try {

            $newCategory = $this->service->create($request->name, $request->description);

            DB::commit();

            return response()->json([
                'message' => 'Category registered successfully',
                'category' => $newCategory->info()
            ], 201);

        }catch (CategoryCreationException $exception) {
            DB::rollBack();
            return $exception->render();
        }
    }

    public function show(int $id) : JsonResponse
    {
        try {
            $category = $this->getService()->showById($id);

            return response()->json(['category' => $category->info()], 200);
        }catch (NotFoundException $exception){
            return $exception->render();
        }
    }

    public function update(int $id, Request $request)
    {
        try {
            $category = $this->service->update($id, $request->name, $request->description);

            return response()->json([
                'category' => $category->info()
            ],200);

        }catch (NotFoundException $exception){
            return $exception->render();
        }
    }

    public function destroy(int $id) : JsonResponse
    {
        DB::beginTransaction();

        try{

            $this->service->delete($id);

            DB::commit();
            return response()->json(null,204);

        }catch (NotFoundException $exception){

            return $exception->render();
        }catch (\Exception $exception){

            return response()->json([
                'message' => $exception->getMessage()
            ], $exception->getCode());
        } finally {
            DB::rollBack();
        }
    }

    public function getService(): CategoryServiceInterface
    {
        return $this->service;
    }

    public function setService(CategoryServiceInterface $service): void
    {
        $this->service = $service;
    }

}
