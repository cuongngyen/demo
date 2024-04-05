<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Services\ProductServices;
use App\Http\Requests\admin\product\ProductRequest;
use App\Http\Requests\admin\product\EditproductRequest;


class ProductController extends Controller
{
    public $productService;

    public function __construct(ProductServices $productService)
    {
        $this->productService = $productService;
    }

    // product
    public function listProduct()
    {   
        $category = $this->productService->getCategory();
        $product = $this->productService->listProduct();
        return view('admin.product.list', compact('product','category'));
        
    }

    public function addProduct()
    {
        $category = $this->productService->getCategory();
        return view('admin.product.add', compact('category'));
    }

    public function postaddProduct(ProductRequest $request, ProductServices $productServices)
    {
        if ($request->hasFile('image')){
            $file = $request->image;
            $productServices->uploadFile($file);
        }
        $product = $this->productService->postaddProduct($request->except('_token'));
        if ($product) {
            return redirect()->route('listProduct')->with('msgSuccess', 'Register product success');
        }
        return redirect()->route('listProduct')->with('msgError', 'Register product fail');
    }

    public function editProduct($id)
    {
        $product = $this->productService->editProduct($id);
        if ($product) {
            $category = $this->productService->getCategory();
            return view('admin.product.edit', compact('product','category')); 
        }
        return redirect()->route('listProduct')->with('msgError', 'Product does not exist');
    }

    public function posteditProduct(EditproductRequest $request, ProductServices $productServices, $id)
    {
        if ($request->hasFile('image')){
            $file = $request->image;
            $productServices->uploadFile($file);
        }
        $product = $this->productService->posteditProduct($id, $request->except('_token'));
        if ($product) {
            return redirect()->route('listProduct')->with('msgSuccess', 'Edit product success');
        }
        return redirect()->route('listProduct')->with('msgError', 'Edit product fail');
    }

    public function deleteProduct($id)
    {
        $product = $this->productService->deleteProduct($id);
        if ($product) {
            return redirect()->route('listProduct')->with('msgSuccess', 'Delete product success');
        }
        return redirect()->route('listProduct')->with('msgError', 'Delete Product fail');
    }
    // end product
    
}
