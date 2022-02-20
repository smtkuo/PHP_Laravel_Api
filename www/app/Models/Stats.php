<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stats extends Model
{
    use HasFactory;

    protected $table = 'stats';
    protected $fillable = [
        'views'
    ];
    protected $primaryKey = 'id';


    protected static function boot()
    {
        parent::boot();
    }



}
