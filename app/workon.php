<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class workon extends Model
{
    protected $table = 'workon';

    protected $primaryKey = 'u_id';

   protected $fillable=['u_id'];


    public function users(){
        return $this ->belongsTo('App\users','u_id');
        $on_time=workon::find(1);
        echo $on_time->users->u_id;
    }

    

}
