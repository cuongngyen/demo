<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ProductServices;
use App\Http\Requests\admin\category\CategoryRequest;
use App\Http\Requests\admin\category\EditcategoryRequest;
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
    public function getProduct()
    {   
        $category = $this->productService->getCategory();
        $product = $this->productService->getProduct();
        return view('admin.product.list', compact('product','category'));
        
    }

    public function getaddProduct()
    {
        $category = $this->productService->getCategory();
        return view('admin.product.add', compact('category'));
    }

    public function postaddProduct(ProductRequest $request)
    {
        $product = $this->productService->postaddProduct($request->except('_token'));
        if ($product) {
            $file = $request->image;
            $file->move('upload/product', $file->getClientOriginalName());
            return redirect()->route('listProduct')->with('msgSuccess', 'Register product success');
        }
        return redirect()->route('listProduct')->with('msgError', 'Register product fail');
    }

    public function geteditProduct($id)
    {
        $product = $this->productService->geteditProduct($id);
        if ($product) {
            $category = $this->productService->getCategory();
            return view('admin.product.edit', compact('product','category')); 
        }
        return redirect()->route('listProduct')->with('msgError', 'Product does not exist');
    }

    public function posteditProduct(EditproductRequest $request, $id)
    {
        $product = $this->productService->posteditProduct($id, $request->except('_token'));
        if ($product) {
            $file = $request->image;
            $file->move('upload/product', $file->getClientOriginalName());
            return redirect()->route('listProduct')->with('msgSuccess', 'Edit product success');
        }
        return redirect()->route('listProduct')->with('msgError', 'Edit product fail');
    }

    public function getdeleteProduct($id)
    {
        $product = $this->productService->getdeleteProduct($id);
        if ($product) {
            return redirect()->route('listProduct')->with('msgSuccess', 'Delete product success');
        }
        return redirect()->route('listProduct')->with('msgError', 'Delete Product fail');
    }
    // end product

    // category

    public function getCategory()
    {
        $category = $this->productService->getCategory();
        return view('admin.category.list', compact('category'));
    }

    public function getaddCategory()
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

    public function geteditCategory($id)
    {
        $category = $this->productService->geteditCategory($id);
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

    public function getdeleteCategory($id)
    {
        $category = $this->productService->getdeleteCategory($id);
        if ($category) {
            return redirect()->route('listCategory')->with('msgSuccess', 'Delete category success');
        } 
        return redirect()->route('listCategory')->with('msgError', 'Delete category fail');
    }
    

}
