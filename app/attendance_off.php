<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class attendance_off extends Model
{
    protected $table = 'attendance_off';

    protected $primaryKey = 'u_id';

    protected $fillable=['u_id'];

    public function users(){
        return $this ->belongsTo('App\users','u_id');
        $off_time=workon::find(1);
        echo $off_time->users->u_name;
    }



}
