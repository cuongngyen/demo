<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    use HasFactory;
    protected $table = 'users';
    public $timestamps = true;
    public $email_verified_at = true;
}
