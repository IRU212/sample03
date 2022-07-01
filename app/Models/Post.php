<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = [
        'id',
        'text',
        'image',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
