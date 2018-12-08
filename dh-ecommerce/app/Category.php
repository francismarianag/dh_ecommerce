<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Category extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $guarded = [];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function amountProducts()
    {
        return $this->products->count();
    }


}
