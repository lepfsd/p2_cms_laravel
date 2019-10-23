<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'description', 'content', 'published_at', 'image'];

    /**
     * Delete from storage
     *
     * @return void
     */
    public function deleteImage()
    {
        Storage::delete($this->image);
    }
}
