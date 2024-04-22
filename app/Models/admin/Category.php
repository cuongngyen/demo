<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'category';
    protected $fillable = ['name'];
    public $timestamps = true;

    public function product()
    {
        return $this->hasMany(Product::class, 'id_category', 'id');
    }
}
