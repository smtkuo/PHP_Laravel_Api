<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'title','slug','description','image','content','is_active'
    ];

    public function posts()
    {
        return $this->hasMany(Categoriables::class, 'categoriable_id')->where("categoriable_type", "categoriables");
    }

    public function post()
    {
        return $this->hasOne(Categoriables::class, 'categoriable_id')->where("categoriable_type", "categoriables");
    }
}
