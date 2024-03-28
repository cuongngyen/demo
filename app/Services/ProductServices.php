<?php
namespace App\Services;

use App\Repositories\product\ProductRepository;

class ProductServices 
{
    protected $productRepository;
    public function __construct(ProductRepository $productrRepository)
    {
        $this->productRepository = $productrRepository;
    }

    // Product 
    public function getProduct() 
    {
        return $this->productRepository->getProduct();
    }

    public function postaddProduct(array $attributes) 
    {
        if ($attributes) {
            $attributes['image'] = $attributes['image']->getClientOriginalName();
            return $this->productRepository->postaddProduct($attributes);
        } 
        return false;
    }

    public function geteditProduct($id) 
    {
        if ($id) {
            return $this->productRepository->geteditproduct($id);
        }
        return false;
    }

    public function posteditProduct($id, array $attributes)
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
            return $this->productRepository->posteditProduct($id, $attributes);
        }
        return false;
    }

    public function getdeleteProduct($id)
    {
        if ($id) {
            return $this->productRepository->getdeleteProduct($id);
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

    public function geteditCategory(int $id) 
    {
        if ($id) {
            return $this->productRepository->geteditCategory($id);    
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

    public function getdeleteCategory($id) 
    {
        if ($id) {
            return $this->productRepository->getdeleteCategory($id);
        }
        return false;
    }
    // end category
}