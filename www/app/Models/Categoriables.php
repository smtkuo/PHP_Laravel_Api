<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoriables extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id','categoriable_id','categoriable_type'
    ];
    
}
