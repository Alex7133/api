<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Resources\CategoryResource;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return CategoryResource::collection(Category::all());
    }

    public function show(Category $category)
    {
        return new CategoryResource($category);
    }
    public function list()
    {
        return CategoryResource::collection(Category::all());
    }

    public function store(StoreCategoryRequest $request)
    {
        $category = Category::create($request->all());
        return new CategoryResource($category);
    }

    public function update(Category $category, StoreCategoryRequest $request)
    {
        $category->update($request->all());
        return new CategoryResource($category);
    }
    public function destroy(Category $category)
    {
        $category->delete();
        //return response(null, Response::HTTP_NO_CONTENT);
        return response()->noContent();
    }
}
