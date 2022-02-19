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


    /**
     * Get all of the posts that are assigned this category.
     */
    public function post()
    {
        return $this->morphedByMany(Post::class, 'categoriable');
    }
}
