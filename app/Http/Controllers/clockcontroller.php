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



            //dd($query);
        $query_wf = DB::table('workoff')
            ->where('u_id','=','1')
            //->where('created_at','like',' 2016%')
            ->get();
        //dd($query_wf);
        $query_wn = DB::table('workon') ->get();

        $query_s = DB::table('workoff') ->get();
        $query_df=DB::table('dayoff')->get();

        $u_nm=DB::table('user')
            ->where('u_id','=','1')
            ->select('u_name')
            ->get();
        //dd($u_nm);

        $rs = array(
            'u_nm' => $u_nm,
            'workon' => $query_wn,
            'workoff' => $query_wf,
            'search' => $query_s,
        );
        $input = \Request::all();

        //$id=$input['id'];
        //dd($id);


        $query_wn = DB::table('workon')
            ->where('u_id','=','1')
            ->take(10)
            ->orderBy('u_id', 'desc')
            ->get();

        //dd($query);
        //$query_end = DB::table('workoff') ->get();
        //$query = DB::table('workon') ->get();

        $query_wf = DB::table('workoff')
            ->where('u_id','=','1')
            ->take(10)
            ->orderBy('u_id', 'desc')
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
            'dayoff' =>$query_df,


        );
        // DB::table('workon')
        //   ->where('u_id', 1)
        // ->update(['created_at' => Carbon::now()]);



        //$query_us =DB::table('workon') ->get('u_id');
        //->whereBetween('created_at', ['2016-07-01', '2016-07-15 '])->get();
        //$on_time=workon::find(1);
        //echo $on_time->users->u_id;





        // $rs = array(
        //   'workon' => $query_wn,
        //  'workoff' => $query_end,
        // 'search' => $query_wn,
        //);


        // return view('clock/view')->with("rs",$rs);
        //, compact('query'))



        //dd($u_rs);

        return View::make('clock/index')->with('u_rs', $u_rs);


        //return view('clock/index')->with("rs",$rs);
        //, compact('query'))





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
        $b=rand(01,59);
        $time=date("Y-m-d H:i:s",strtotime(date("Y-m-d")." $a:$b:$b"));
        //dd($time);



        if ($input["action_typ"] == "on") {

            $query_wn = DB::table('workon')

                ->where('u_id','=','1')
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
                DB::table('workon')
                    ->insert(array('u_id' => 1, 'created_at' => Carbon::now()));
                //dd($query);

            }
            else
            {
                //update
                //check today on existed
                DB::table('workon')
                    ->where('u_id', 1)
                    ->whereBetween('created_at',[$start_time,$end_time])
                    //->where('action_typ','=','on')
                    //->has('created_at')
                    ->update(['created_at' => Carbon::now()]);
                //dd($query_wn);

            }


        }
        else {
            $query_wf = DB::table('workoff')
                ->where('u_id','=','1')
                ->whereBetween('created_at',[$start_time,$end_time])
                //->where('action_typ','=','on')
                ->first();
            //dd($query_wf);
            if ($query_wf == null) {
                DB::table('workoff')
                    ->insert(array('u_id' => 1, 'created_at' => Carbon::now()));
            }

            else{
                DB::table('workoff')
                    ->where('u_id', 1)
                    ->whereBetween('created_at',[$start_time,$end_time])
                    //->where('action_typ','=','on')
                    //->has('created_at')
                    ->update(['created_at' => Carbon::now()]);

            }
            }


        //if($input["action_typ"] == "search"){
        //$request->whereBetween('created_at', ['2016-07-01', '2016-07-15 '])->get();
        //return view('clock/show');
        //}
        //clock::create();//$request->all()

        //return Redirect::to('/clock/index');

        return Redirect::to('/clock/index');

        //return view('clock/show');

        //return $request->all();
    }
    public function schedule(){
        $a= rand(8,9);
        $b=rand(01,59);
        $time=date("Y-m-d H:i:s",strtotime(date("Y-m-d")." $a:$b:$b"));
        //dd($time);

            $start_time = Carbon::today();
            $end_time = Carbon::tomorrow();

            $query_wn = DB::table('workon')
                ->where('u_id', '=', '1')
                ->whereBetween('created_at', [$start_time, $end_time])
                ->where('action_typ','=','on')
                ->get();
            if ($query_wn == null) {
                DB::table('workon')
                    ->insert(array('u_id' => 1, 'created_at' => $time));
            }
        }


    public function user_check(){

        //select all user

        $users =DB::table('user')
            ->get();
        foreach ( $users as $user){
            $user -> u_id;
        }


    }
        public function wn_check($user){

            //select all uuser
            $users = DB::table('user')
                //->where('u_id','=','1')
                ->get();



            $a= rand(8,9);
            $b=rand(01,59);
            $time=date("Y-m-d H:i:s",strtotime(date("Y-m-d")." $a:$b:$b"));
            $wn_start_time_=date("Y-m-d H:i:s",strtotime(date("Y-m-d")." 08:00:00"));
            $wn_end_time=date("Y-m-d H:i:s",strtotime(date("Y-m-d")." 10:00:00"));
            $query_wn = DB::table('workon')
                ->where('u_id','=','1')
                ->whereBetween('created_at',[$wn_start_time_,$wn_end_time])
                //->where('action_typ','=','on')
                ->get();
            if( $query_wn == null )
            {

                //insert
                //換句話說每次打卡時，都會先檢查是否已經存在了
                DB::table('workon')
                    ->insert(array('u_id' => 1, 'created_at' => $time));
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
        $list_wn = DB::table('workon')
            ->whereBetween('created_at', [$f_time, $s_time])
            ->Where(function($query_wn) use ($uid)
            {

                if( $uid !="")
                    $query_wn->where('u_id', '=',$uid );


            })
            ->get();


        //$uid =DB::table('workon')
          //  -> where('u_id', '=', $_POST['uid'])->get();
        //$list_wf = DB::table('workoff')
           // ->whereBetween('created_at',[$input['q'],$input['e']]);
        //search that student in Database
        //$date= workon::find($keyword);
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
        $user = DB::table('user')->where('u_id', $id)
            ->select('u_name')
            ->get();
        //$uid = DB::table('user')
            //->leftjoin('workon', 'workon.u_id', '=', 'user.u_id')
          //  ->where('u_name','=',$id)
            //->get();
        //dd($user);
        $u_id_wn=DB::table('workon')
            ->where('u_id',$id)
            ->select('created_at as workon')
            ->get();
        //    $u_id_wn = DB::table('user')
                //->where('user.u_id', '=', $id)
          //      ->join('workon', 'workon.u_id', '=', 'user.u_id')
                //->join('workoff', 'workoff.u_id', '=', 'user.u_id')
            //    ->select('user.u_name','workon.created_at AS workon')
              //  ->get();
        //dd($u_id_wn);

        $u_id_wf=DB::table('workoff')
            ->where('u_id',$id)
            ->select('created_at as workoff')
            ->get();

        //$u_id_wf = DB::table('user')
            //->where('user.u_id', '=', $id)
            //->leftjoin('workon', 'workon.u_id', '=', 'user.u_id')
          //  ->join('workoff', 'workoff.u_id', '=', 'user.u_id')
            //->select('user.u_name','workoff.created_at AS workoff')
            //->get();
        //dd($u_id_wf);
        $query_wn = DB::table('workon')
            ->where('u_id','=','1')
            ->take(10)
            ->orderBy('u_id', 'desc')
            ->get();

        //dd($query);
        //$query_end = DB::table('workoff') ->get();
        //$query = DB::table('workon') ->get();

        $query_wf = DB::table('workoff')
            ->where('u_id','=','1')
            ->take(10)
            ->orderBy('u_id', 'desc')
            ->get();
        $query_df=DB::table('dayoff')->get();

        //dd($query_wn);
        $u_rs=array(
            'u_nm' => $user,
            'u_wn' => $u_id_wn,
            'u_wf' => $u_id_wf,
            'wn' => $query_wn,
            'wf' => $query_wf,
            'dayoff' => $query_df
        );
        // DB::table('workon')
        //   ->where('u_id', 1)
        // ->update(['created_at' => Carbon::now()]);



        //$query_us =DB::table('workon') ->get('u_id');
        //->whereBetween('created_at', ['2016-07-01', '2016-07-15 '])->get();
        //$on_time=workon::find(1);
        //echo $on_time->users->u_id;





       // $rs = array(
         //   'workon' => $query_wn,
          //  'workoff' => $query_end,
           // 'search' => $query_wn,
        //);


       // return view('clock/view')->with("rs",$rs);
        //, compact('query'))



        //dd($u_rs);

        return View::make('clock/index')->with('u_rs', $u_rs);



    }
    public function dayoff(){


        return View::make('dayoff');
    }
    public function dayoff_store(){
        $input=\Request::all();
        //dd($input);
        DB::table('dayoff')
            ->insert(array('u_id' => 1, 'hap_time'=>$input["hap_time"],
                'choices'=>$input["dayoff_type"],'leave_reason'=>$input["reason"], 'created_at' => Carbon::now()));
        $query_df=DB::table('dayoff')
            ->where('u_id','=',1)
            ->get();



        return Redirect::to('/clock/index');
    }



}
