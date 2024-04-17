<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryPost extends Model
{
    use HasFactory;
    public $timestamp = false;
    protected $fillable = ['title'];
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
