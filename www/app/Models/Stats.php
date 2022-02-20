<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Stats extends Model
{
    use HasFactory;

    protected $table = 'stats';
    protected $fillable = [
        'post_id','views'
    ];
    protected $primaryKey = 'id';


    protected static function boot()
    {
        parent::boot();
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function newVisit()
    {
            return ++$this->views;
    }



}
