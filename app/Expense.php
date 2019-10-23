<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\user;
use App\Category;
class Expense extends Model
{
    public function category(){
        return $this->belongsTo('App\Category');
    }
    
    public function user(){
        return $this->belongsTo('App\User');
    }
}
