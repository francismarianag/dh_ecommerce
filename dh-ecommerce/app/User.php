<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;


class User extends Authenticatable
{
    use SoftDeletes;
    protected $guarded = [];
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function products()
    {
        return $this->belongsTo(Product::class);
    }

    public function getStatus()
    {
        if ($this->attributes['deleted_at'] == null) {
            return 'Activo';
        } else {
            return 'Inactivo';
        }
    }

    public function getProfile()
    {
        if ($this->attributes['role_id'] == 1) {
            return 'Admin';
        } else {
            return 'Customer';
        }
    }
    
}
