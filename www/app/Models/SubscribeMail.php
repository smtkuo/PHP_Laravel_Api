<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscribeMail extends Model
{
    use HasFactory;

    protected $table = 'subscribe_mails';
    protected $fillable = [
        'mail'
    ];
    protected $primaryKey = 'id';


    protected static function boot()
    {
        parent::boot();

    }
}
