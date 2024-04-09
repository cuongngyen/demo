<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Services\CategoryServices;
use App\Http\Requests\admin\category\EditcategoryRequest;
use App\Http\Requests\admin\category\CategoryRequest;
class CategoryController extends Controller
{
    public $categoryService;

    public function __construct(CategoryServices $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function listCategory()
    {
        $category = $this->categoryService->listCategory();
        return view('admin.category.list', compact('category'));
    }

    public function createCategory()
    {
        return view('admin.category.add');
    }
    
    public function storeCategory(CategoryRequest $request)
    {
        $category = $this->categoryService->storeCategory($request->except('_token'));
        if ($category) {
            return redirect()->route('listCategory')->with('msgSuccess', 'Register category success');
        }
        return redirect()->route('listCategory')->with('msgError', 'Register category fail');
    }

    public function editCategory($id)
    {
        $category = $this->categoryService->editCategory($id);
        if ($category) {
            return view('admin.category.edit', compact('category'));
        }
        return redirect()->route('listCategory')->with('msgError', 'Category does not exist');
    }

    public function updateCategory(EditcategoryRequest $request, $id)
    {
        $category = $this->categoryService->updateCategory($id ,$request->except('_token'));
        if ($category) {
            return redirect()->route('listCategory')->with('msgSuccess', 'Update category success');
        } 
        return redirect()->route('listCategory')->with('msgError', 'Update category fail');
    }

    public function deleteCategory($id)
    {
        $category = $this->categoryService->deleteCategory($id);
        if ($category) {
            return redirect()->route('listCategory')->with('msgSuccess', 'Delete category success');
        } 
        return redirect()->route('listCategory')->with('msgError', 'Delete category fail');
    }
}
