<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'description', 'content', 'published_at', 'image', 'category_id', 'user_id'];

    /**
     * Delete from storage
     *
     * @return void
     */
    public function deleteImage()
    {
        Storage::delete($this->image);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function hasTag($id)
    {
        return in_array($id, $this->tags->pluck('id')->toArray()); 
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopedSearched ($query)
    {
        $search = request()->query('search');

        if(!$search) {
            return $query;
        }

        return $query->where('title', 'LIKE', "%{$search}%");
    }

}
