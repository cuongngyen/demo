<?php
namespace App\Repositories\product;
use App\Models\admin\Product;

class ProductRepository 
{
    // product
    public function listProduct() 
    {
        return Product::with('category')->get();
    }

    public function storeProduct(array $attributes) 
    {
        return Product::create($attributes);
    }

    public function editProduct($id) 
    {
        return Product::find($id);
    }

    public function updateProduct($id, array $attributes)
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

}