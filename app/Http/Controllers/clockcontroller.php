<?php

namespace App\Http\Controllers;

use App\users;
use App\workoff;
use App\workon;
use Carbon\Carbon;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;


class clockcontroller extends Controller
{
    public function index(Request $request)

    {




        $query_off = DB::table('attendance_off')
            ->where('uid','=','1')
            ->get();

        $query_on = DB::table('attendance_on') ->get();

        $query_s = DB::table('attendance_off') ->get();
        $query_dayoff=DB::table('dayoff')->get();

        $u_nm=DB::table('user')
            ->where('uid','=','1')
            ->select('u_name')
            ->get();




        $query_wn = DB::table('attendance_on')
            ->where('uid','=','1')
            ->take(10)
            ->orderBy('created_at', 'desc')
            ->get();


        $query_wf = DB::table('attendance_off')
            ->where('uid','=','1')
            ->take(10)
            ->orderBy('created_at', 'desc')
            ->get();

        //dd($query_wn);
        $u_rs=array(
            'u_nm' => $u_nm,
            //'u_wn' => $u_id_wn,
            //'u_wf' => $u_id_wf,
            'wn' => $query_wn,
            'wf' => $query_wf,
            'workon' => $query_wn,
            'workoff' => $query_wf,
            'search' => $query_s,
            'dayoff' =>$query_dayoff,


        );


        return View::make('clock/index')->with('u_rs', $u_rs);






    }
    public function create()
    {
        return view('clock/show');
    }

    public function store(Request $request)
    {
        //dd($request);



        $input = \Request::all();

         //dd($input);
        $start_time=Carbon::today();
        $end_time=Carbon::tomorrow();
        //dd($end_time);



        $a= rand(8,9);
        $b=rand(00,59);
        $time=date("Y-m-d H:i:s",strtotime(date("Y-m-d")." $a:$b:$b"));
        //dd($time);



        if ($input["action_typ"] == "on") {

            $query_wn = DB::table('attendance_on')

                ->where('uid','=','1')
                ->whereBetween('created_at',[$start_time,$end_time])
                //->where('action_typ','=','on')
                ->get();
            //dd($query_wn);
            //$value = str_limit('The PHP framework for web artisans.', 7);
            //dd($query);




            if( $query_wn == null )
            {

                //insert
                //換句話說每次打卡時，都會先檢查是否已經存在了
                DB::table('attendance_on')
                    ->insert(array('uid' => 1, 'created_at' => Carbon::now()));
                //dd($query);

            }
            else
            {
                //update
                //check today on existed
                DB::table('attendance_on')
                    ->where('uid', 1)
                    ->whereBetween('created_at',[$start_time,$end_time])
                    //->where('action_typ','=','on')
                    //->has('created_at')
                    ->update(['created_at' => Carbon::now()]);
                //dd($query_wn);

            }


        }
        else {
            $query_wf = DB::table('attendance_off')
                ->where('uid','=','1')
                ->whereBetween('created_at',[$start_time,$end_time])
                //->where('action_typ','=','on')
                ->first();
            //dd($query_wf);
            if ($query_wf == null) {
                DB::table('attendance_off')
                    ->insert(array('uid' => 1, 'created_at' => Carbon::now()));
            }

            else{
                DB::table('attendance_off')
                    ->where('uid', 1)
                    ->whereBetween('created_at',[$start_time,$end_time])
                    //->where('action_typ','=','on')
                    //->has('created_at')
                    ->update(['created_at' => Carbon::now()]);

            }
            }

        return Redirect::to('/clock/index');


    }
    public function schedule(){
        $a= rand(8,9);
        $b=rand(01,59);
        $time=date("Y-m-d H:i:s",strtotime(date("Y-m-d")." $a:$b:$b"));
        //dd($time);

            $start_time = Carbon::today();
            $end_time = Carbon::tomorrow();

            $query_wn = DB::table('attendance_on')
                ->where('uid', '=', '1')
                ->whereBetween('created_at', [$start_time, $end_time])
                ->where('action_typ','=','on')
                ->get();
            if ($query_wn == null) {
                DB::table('attendance_on')
                    ->insert(array('uid' => 1, 'created_at' => $time));
            }
        }


    public function user_check(){

        //select all user

        $users =DB::table('user')
            ->get();
        foreach ( $users as $user){
            $user -> uid;
        }


    }
        public function wn_check($user=null){

            //select all uuser


          //  $users = DB::table('user')
                //->where('u_id','=','1')
            //    ->get();



            $a= rand(8,9);
            $b=rand(00,59);
            $c=rand(00,59);
            $time=date("Y-m-d H:i:s",strtotime(date("Y-m-d")." $a:$b:$c"));
            $wn_start_time_=date("Y-m-d H:i:s",strtotime(date("Y-m-d")." 08:00:00"));
            $wn_end_time=date("Y-m-d H:i:s",strtotime(date("Y-m-d")." 10:00:00"));
            $query_wn = DB::table('attendance_on')
                ->where('uid','=','1')
                ->whereBetween('created_at',[$wn_start_time_,$wn_end_time])
                //->where('action_typ','=','on')
                ->get();
            if( $query_wn == null )
            {

                //insert
                //換句話說每次打卡時，都會先檢查是否已經存在了
                DB::table('attendance_on')
                    ->insert(array('uid' => 1, 'created_at' => $time));
                //dd($query);

            }
        }

    public function wf_check($user){

        //select all uuser
        // $users = DB::table('user')
        //->where('u_id','=','1')
        //   ->get();



        $a= rand(8,9);
        $b=rand(00,59);
        $c=rand(00,59);
        $time=date("Y-m-d H:i:s",strtotime(date("Y-m-d")." $a:$b:$c"));
        $wf_start_time_=date("Y-m-d H:i:s",strtotime(date("Y-m-d")." 08:00:00"));
        $wf_end_time=date("Y-m-d H:i:s",strtotime(date("Y-m-d")." 10:00:00"));
        $query_wf = DB::table('attendance_off')
            ->where('uid','=','1')
            ->whereBetween('created_at',[$wf_start_time_,$wf_end_time])
            //->where('action_typ','=','on')
            ->get();
        if( $query_wf == null )
        {

            //insert
            //換句話說每次打卡時，都會先檢查是否已經存在了
            DB::table('attendance_off')
                ->insert(array('uid' => 1, 'created_at' => $time));
            //dd($query);

        }
    }




    public function goSearch()
    {

        
        $rs = array(
            'list' => null,
            'bgn' => null,
            'end' => null
        );

        
        return View::make('/clock/selfservice')->with('rs', $rs);
    }
    public function getSearch()
    {

        $input= \Request::all();
        $uid = $input['uid'];
        //dd($input['q']);
        //get keywords input for search
        $f_time = $input['q'];
        $s_time = $input['e'];
        $list_wn = DB::table('attendance_on')
            ->whereBetween('created_at', [$f_time, $s_time])
            ->Where(function($query_wn) use ($uid)
            {

                if( $uid !="")
                    $query_wn->where('uid', '=',$uid );


            })
            ->get();


        $rs = array(
            'list' => $list_wn,
            //'list_wf'=>$list_wf,
            //'uid' =>$list_uid,

            'bgn' => $input['q'],
            'end' => $input['e']
        );
        //dd($rs);
        //return display search result to user by using a view
        return View::make('/clock/selfservice')->with('rs', $rs);
    }
    public function f_id(Request $request){

        $input = \Request::all();


            $id=$input['id'];
        //dd($id);

        //抓名字
        $user = DB::table('user')->where('uid', $id)
            ->select('u_name')
            ->get();
        //$uid = DB::table('user')
            //->leftjoin('workon', 'workon.u_id', '=', 'user.u_id')
          //  ->where('u_name','=',$id)
            //->get();
        //dd($user);
        $uid_wn=DB::table('attendance_on')
            ->where('uid',$id)
            ->select('created_at as workon')
            ->get();


        $uid_wf=DB::table('attendance_off')
            ->where('uid',$id)
            ->select('created_at as workoff')
            ->get();


        $query_wn = DB::table('attendance_on')
            ->where('uid','=','1')
            ->take(10)
            ->orderBy('created_at', 'desc')
            ->get();


        $query_wf = DB::table('attendance_off')
            ->where('uid','=','1')
            ->take(10)
            ->orderBy('uid', 'desc')
            ->get();
        $query_df=DB::table('dayoff')->get();

        //dd($query_wn);
        $u_rs=array(
            'u_nm' => $user,
            'u_wn' => $uid_wn,
            'u_wf' => $uid_wf,
            'wn' => $query_wn,
            'wf' => $query_wf,
            'dayoff' => $query_df
        );


        return View::make('clock/index')->with('u_rs', $u_rs);



    }
    public function dayoff(){


        return View::make('dayoff');
    }
    public function dayoff_store(){
        $input=\Request::all();
        //dd($input);
        DB::table('dayoff')
            ->insert(array('uid' => 1, 'leave_day'=>$input["leave_day"],
                'leave_typ'=>$input["leave_typ"],'leave_desc'=>$input["leave_desc"], 'created_at' => Carbon::now()));
        $query_df=DB::table('dayoff')
            ->where('uid','=',1)
            ->get();



        return Redirect::to('/clock/index');
    }



}
