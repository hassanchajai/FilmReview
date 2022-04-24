<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable=[
        "title","description","image","category_id"
    ];
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function votes(){
        return $this->hasMany(Vote::class);
    }
}
