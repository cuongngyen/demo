<?php
namespace App\Services;

use App\Repositories\category\CategoryRepository;
class CategoryServices 
{
    protected $categoryRepository;
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    
    // category
    public function listCategory() 
    {
        return $this->categoryRepository->listCategory();
    }

    public function storeCategory(array $attributes) 
    {
        if($attributes){
            return $this->categoryRepository->storeCategory($attributes);
        }
        return false;
    }

    public function editCategory(int $id) 
    {
        if ($id) {
            return $this->categoryRepository->editCategory($id);    
        }
        return false;
    }

    public function updateCategory($id, array $attributes) 
    {
        if ($id && $attributes) {
            return $this->categoryRepository->updateCategory($id, $attributes);    
        }
        return false;
    }

    public function deleteCategory($id) 
    {
        if ($id) {
            return $this->categoryRepository->deleteCategory($id);
        }
        return false;
    }
    // end category


}