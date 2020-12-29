<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo('App\User');
    }

    protected $fillable = [
        'title', 'content', 'user_id' , 'bookMark'
    ];
}
