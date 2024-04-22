<?php
namespace App\Repositories\category;
use App\Models\admin\Category;

class CategoryRepository 
{
    // category
    public function listCategory() 
    {
        return Category::get();
    }
    
    public function storeCategory(array $attributes) 
    {
        return Category::create($attributes);
    }

    public function editCategory($id) 
    {
        return Category::find($id);
    }

    public function updateCategory($id, array $attributes) 
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