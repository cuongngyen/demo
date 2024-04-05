<?php
namespace App\Repositories\product;
use App\Models\admin\Category;
use App\Models\admin\Product;

class ProductRepository 
{
    // product
    public function listProduct() 
    {
        return Product::get();
    }

    public function postaddProduct(array $attributes) 
    {
        return Product::create($attributes);
    }

    public function editProduct($id) 
    {
        return Product::find($id);
    }

    public function posteditProduct($id, array $attributes)
    {
        $product = Product::find($id);
        if ($product) {
            return $product->update($attributes);
        }
        return false;
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        if ($product) {
            return $product->delete();
        }
        return false;
    }


    // category
    public function getCategory() 
    {
        return Category::get();
    }
    
    public function postaddCategory(array $attributes) 
    {
        return Category::create($attributes);
    }

    public function editCategory($id) 
    {
        return Category::find($id);
    }

    public function posteditCategory($id, array $attributes) 
    {
        $category = Category::find($id);
        if ($category) {
            return $category->update($attributes);
        }
        return false;
    }

    public function deleteCategory($id) 
    {
        $category = Category::find($id);
        if ($category) {
            return $category->delete();
        }
        return false;
    }
    // end category
}