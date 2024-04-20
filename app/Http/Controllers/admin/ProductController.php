<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Services\ProductServices;
use App\Http\Requests\admin\product\ProductRequest;
use App\Http\Requests\admin\product\ProducteditRequest;
use App\Services\CategoryServices;

class ProductController extends Controller
{
    public $productService;
    public $categoryService;

    public function __construct(ProductServices $productService, CategoryServices $categoryService)
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
    }

    // product
    public function listProduct()
    {   
        $product = $this->productService->listProduct();
        return view('admin.product.list', compact('product'));
    }

    public function createProduct()
    {
        $category = $this->categoryService->listCategory();
        return view('admin.product.add', compact('category','category'));
    }

    public function storeProduct(ProductRequest $request, ProductServices $productServices)
    {
        $product = $this->productService->storeProduct($request->except('_token'));
        if ($product) {
            return redirect()->route('listProduct')->with('msgSuccess', 'Register product success');
        }
        return redirect()->route('listProduct')->with('msgError', 'Register product fail');
    }

    public function editProduct($id)
    {

        $product = $this->productService->editProduct($id);

        if ($product) {
            $category = $this->categoryService->listCategory();
            return view('admin.product.edit', compact('product','category')); 
        }
        return redirect()->route('listProduct')->with('msgError', 'Product does not exist');
    }

    public function updateProduct(ProducteditRequest $request, $id)
    {
        $imageOld = $this->productService->getImageOld($id);
        $product = $this->productService->updateProduct($request->except('_token'), $id, $imageOld);
        if ($product) {
            return redirect()->route('listProduct')->with('msgSuccess', 'Edit product success');
        }
        return redirect()->route('listProduct')->with('msgError', 'Edit product fail');
    }

    public function deleteProduct($id)
    {
        $imageOld = $this->productService->getImageOld($id);
        $product = $this->productService->deleteProduct($id,$imageOld);
        if ($product) {
            return redirect()->route('listProduct')->with('msgSuccess', 'Delete product success');
        }
        return redirect()->route('listProduct')->with('msgError', 'Delete Product fail');
    }
    // end product
    
}
