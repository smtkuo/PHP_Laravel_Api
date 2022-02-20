<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    use HasFactory;
    protected $table = 'images';
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

    public function statsModel()
    {
        return $this->hasOne(Stats::class, 'image_id', 'id');
    }
}
