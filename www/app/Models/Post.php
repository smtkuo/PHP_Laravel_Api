<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $fillable = [
        'title','slug','description','image','content','is_active'
    ];
    protected $primaryKey = 'id';

    /**
     * Get all of the posts that are assigned this category.
     */
    public function category()
    {
        return $this->morphedByMany(Category::class, 'categoriable');
    }

}
