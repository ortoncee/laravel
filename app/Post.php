<?php

namespace App;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Post extends Model
{
    use softDeletes;

    protected $fillable = [
        'title', 'description', 'content', 'image', 'published_at'
    ];

    /**
    * Delete post image from Storage
    *
    * @return void
    */
    public function deleteImage() {
        Storage::delete($this->image);
    }
}
