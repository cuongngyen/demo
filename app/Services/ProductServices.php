<?php
namespace App\Services;

use App\Repositories\product\ProductRepository;
use Illuminate\Support\Facades\File; 
use App\Models\admin\Product;

class ProductServices 
{
    protected $productRepository;
    public function __construct(ProductRepository $productrRepository)
    {
        $this->productRepository = $productrRepository;
    }

    // Product 
    public function listProduct() 
    {
        return $this->productRepository->listProduct();
    }

    public function storeProduct(array $attributes) 
    {
        if ($attributes) {
            $attributes['image'] = $attributes['image']->getClientOriginalName();
            $product = Product::where('image', $attributes['image'])->get();
            if (count($product) != 0) {
                File::delete(public_path('upload/product/'. $attributes['image']));
            }
            return $this->productRepository->storeProduct($attributes);
        } 
        return false;
    }
    
    public function editProduct($id) 
    {
        if ($id) {
            return $this->productRepository->editProduct($id);
        }
        return false;
    }

    public function updateProduct($id, array $attributes)
    {
        if ( empty($attributes['description']) ) {
            unset($attributes['description']);
        } 
        if ( empty($attributes['id_category']) ) {
            unset($attributes['id_category']);
        }
        if ( !empty($attributes['image']) ) {
            $attributes['image'] = $attributes['image']->getClientOriginalName();
        }
        if ($id && $attributes) {
            return $this->productRepository->updateProduct($id, $attributes);
        }
        return false;
    }

    public function deleteProduct($id)
    {
        if ($id) {
            return $this->productRepository->deleteProduct($id);
        }
        return false;
    }

    // upload

    public function uploadFile($file)
    {
        if ($file) {
            $file->move(base_path('public/upload/product'), $file->getClientOriginalName());
        } 
        return false;
    }

    public function deleteFile($id)
    {
        $listProduct = $this->productRepository->listProduct()->where('id', '!=', $id)->toArray();
        $firstImage = array_column($listProduct, 'image');
        $imageId = $this->productRepository->editProduct($id)->image;
        if (!in_array($imageId,$firstImage)) {
            File::delete(public_path('upload/product/'. $imageId));
        } 
    }
    // end upload

}