<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Database\Eloquent\Model;
// Use App\Role;

class User extends Authenticatable
{
    use Notifiable;
    public function roles()
    {
        return $this->belongsTo('App\Role');   
    }
    
    public function expense()
    {
        return $this->hasMany('App\Expense');   
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','email','username', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
