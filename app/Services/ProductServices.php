<?php
namespace App\Services;

use App\Repositories\product\ProductRepository;
use Illuminate\Support\Str;
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

    public function postaddProduct(array $attributes) 
    {
        if ($attributes) {
            $attributes['image'] = $attributes['image']->getClientOriginalName();
            return $this->productRepository->postaddProduct($attributes);
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

    public function posteditProduct($id, array $attributes)
    {
        // dd($attributes);
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
            return $this->productRepository->posteditProduct($id, $attributes);
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

    // category
    public function getCategory() 
    {
        return $this->productRepository->getCategory();
    }

    public function postaddCategory(array $attributes) 
    {
        if($attributes){
            return $this->productRepository->postaddCategory($attributes);
        }
        return false;
    }

    public function editCategory(int $id) 
    {
        if ($id) {
            return $this->productRepository->editCategory($id);    
        }
        return false;
    }

    public function posteditCategory($id, array $attributes) 
    {
        if ($id && $attributes) {
            return $this->productRepository->posteditCategory($id, $attributes);    
        }
        return false;
    }

    public function deleteCategory($id) 
    {
        if ($id) {
            return $this->productRepository->deleteCategory($id);
        }
        return false;
    }
    // end category

    // upload

    public function uploadFile($file)
    {
        if ($file) {
            $file->move(base_path('public/upload/product'), $file->getClientOriginalName());
        } 
        return false;
    }
    // end upload
}