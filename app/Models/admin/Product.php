<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $fillable = ['name','image','quantity','description','price','id_category'];
    public $timestamps = true;

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category', 'id');
    }
   
}
