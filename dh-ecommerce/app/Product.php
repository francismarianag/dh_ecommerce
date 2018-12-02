<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getImage()
    {
        if (!$this->attributes['image']) {
            return 'http://placehold.it/700x400';
        }

        return "/storage/".$this->attributes['image'];
    }
    
}
