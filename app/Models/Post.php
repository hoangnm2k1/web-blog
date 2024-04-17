<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    public $timestamp = false;
    protected $fillable = ['title', 'short_desc', 'content', 'image', 'post_category_id'];

    public function categoryPost()
    {
        return $this->belongsTo(CategoryPost::class, 'post_category_id');
        // return $this->belongsTo('App\Models\CategoryPost');

    }

    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('F d, Y');;
    }

    public function getUpdatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('F d, Y');;
    }
}

