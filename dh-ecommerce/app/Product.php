<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
    use SoftDeletes;
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
    
    public function getStatus()
    {
        if ($this->attributes['status']) {
            return 'Activo';
        } else {
            return 'Inactivo';
        }
    }
}
