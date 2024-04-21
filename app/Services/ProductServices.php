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
            $upload = $this->uploadFile($attributes);
            $attributes['image'] = $upload;
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

    public function updateProduct(array $attributes, $id, $imageOld)
    {
        if (!empty($attributes['image']) ) { 
            $nameImage = $this->uploadFile($attributes, $imageOld, $id);
            $attributes['image'] = $nameImage;
        }
        return $this->productRepository->updateProduct($id, $attributes); 
    }

    public function getImageOld($id) 
    {
        return $this->editProduct($id);
    }

    public function deleteProduct($id, $imageOld)
    {
        if ($id) {
            $this->deleteFile($imageOld);
        }
        return $this->productRepository->deleteProduct($id);
    }

    public function uploadFile($attributes, $imageOld="", $id="")
    {
        if (!empty($attributes['image'])) {
            $nameImage = str() . uniqid() . '.' . $attributes['image']->getClientOriginalExtension();
        } 

        if ($imageOld) {
            $checkPath = File::exists(public_path('upload/product/'. $imageOld['image']));
            if ($checkPath) {
                File::delete(public_path('upload/product/'. $imageOld['image']));
            }
            $attributes['image']->move(base_path('public/upload/product'), $nameImage);
            return $nameImage;
        } 

        $attributes['image']->move(base_path('public/upload/product'), $nameImage);
        return $nameImage;
    }

    public function deleteFile($imageOld)
    {
        $checkPath = File::exists(public_path('upload/product/'. $imageOld['image']));
        if ($checkPath) {
            File::delete(public_path('upload/product/'. $imageOld['image']));
        }
    }

}