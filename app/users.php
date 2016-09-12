<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class users extends Model
{
    protected $table = 'user';

    protected $primaryKey = 'u_id';

    protected $fillable=['u_name'];

    public function on_time(){
        return $this->hasMany('App\workon','u_id','u_id');

        $on_time=users::find(1)->on_time()->where('u_name');

        foreach ($on_time as $on_time){

        }
    }
    public function off_time(){
        return $this->hasMany('App\workoff','u_id','u_id');

        $off_time=users::find(1)->off_time()->where('u_name');

        foreach ($off_time as $off_time){

        }
    }





}
