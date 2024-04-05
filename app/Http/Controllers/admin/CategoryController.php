<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Services\ProductServices;
use App\Http\Requests\admin\category\CategoryRequest;
use App\Http\Requests\admin\category\EditcategoryRequest;

class CategoryController extends Controller
{
    public $productService;
    
    public function __construct(ProductServices $productService)
    {
        $this->productService = $productService;
    }

    public function listCategory()
    {
        $category = $this->productService->getCategory();
        return view('admin.category.list', compact('category'));
    }

    public function addCategory()
    {
        return view('admin.category.add');
    }
    
    public function postaddCategory(CategoryRequest $request)
    {
        $category = $this->productService->postaddCategory($request->except('_token'));
        if ($category) {
            return redirect()->route('listCategory')->with('msgSuccess', 'Register category success');
        }
        return redirect()->route('listCategory')->with('msgError', 'Register category fail');
    }

    public function editCategory($id)
    {
        $category = $this->productService->editCategory($id);
        if ($category) {
            return view('admin.category.edit', compact('category'));
        }
        return redirect()->route('listCategory')->with('msgError', 'Category does not exist');
    }

    public function posteditCategory(EditcategoryRequest $request, $id)
    {
        $category = $this->productService->posteditCategory($id ,$request->except('_token'));
        if ($category) {
            return redirect()->route('listCategory')->with('msgSuccess', 'Update category success');
        } 
        return redirect()->route('listCategory')->with('msgError', 'Update category fail');
    }

    public function deleteCategory($id)
    {
        $category = $this->productService->deleteCategory($id);
        if ($category) {
            return redirect()->route('listCategory')->with('msgSuccess', 'Delete category success');
        } 
        return redirect()->route('listCategory')->with('msgError', 'Delete category fail');
    }
}
