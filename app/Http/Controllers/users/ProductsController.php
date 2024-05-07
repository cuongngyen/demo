<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Services\admin\product\ProductServices;
use App\Http\Requests\admin\product\ProductRequest;
use App\Http\Requests\admin\product\ProducteditRequest;
use App\Services\admin\category\CategoryServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    public $productService;
    public $categoryService;

    public function __construct(ProductServices $productService, CategoryServices $categoryService)
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
    }

    public function productList()
    {
        $id = Auth::user()->id;
        $product = $this->productService->productMember($id);
        return view('users/product/list',compact('product'));
    }

    public function createProduct()
    {
        $category = $this->categoryService->listCategory();
        
        return view('users/product/add',compact('category'));
    }

    public function storeProduct(ProductRequest $request)
    {
        $product = $this->productService->storeProduct($request->except('_token'));
        if ($product) {
            return redirect()->route('listProducts')->with('msgSuccess', 'Register product success');
        }
        return redirect()->route('listProducts')->with('msgError', 'Register product fail');
    }
    
    public function editProduct($id)
    {
        $product = $this->productService->editProduct($id);
        if ($product) {
            $category = $this->categoryService->listCategory();
            return view('users.product.edit',compact('product','category')); 
        }
    }

    public function updateProduct(ProducteditRequest $request, $id)
    {
        $imageOld = $this->productService->getImageOld($id);
        $request['status'] = 0;
        $product = $this->productService->updateProduct($request->except('_token'), $id, $imageOld);
        if ($product) {
            return redirect()->route('listsProduct')->with('msgSuccess', 'Edit product success');
        }
        return redirect()->route('listsProduct')->with('msgError', 'Edit product fail');    
    }

    public function deleteProduct($id)
    {
        $product = $this->productService->deleteProduct($id);
        if ($product) {
            return redirect()->route('listsProduct')->with('msgSuccess', 'Delete product success');
        }
        return redirect()->route('listsProduct')->with('msgError', 'Delete Product fail');
    }
}
