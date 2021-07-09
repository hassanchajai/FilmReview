<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;
    protected $fillable=[
        "title","description","image"
    ];
    public function comments(){
        return $this->hasMany(Comment::class);
    }
   
}
