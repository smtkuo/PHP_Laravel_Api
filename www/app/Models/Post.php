<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Stats;
use App\Models\Categoriables;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $fillable = [
        'title','slug','description','image','content','is_active'
    ];
    protected $primaryKey = 'id';


    protected static function boot()
    {
        parent::boot();

    }

    public function categories()
    {
        return $this->hasMany(Categoriables::class);
    }

    public function category()
    {
        return $this->hasOne(Categoriables::class);
    }

    public function categoriable()
    {
        return $this->morphedByMany(Categoriables::class, 'categoriable');
    }

    public function stats()
    {
        return $this->hasOne(Stats::class, 'post_id', 'id');
    }

}
