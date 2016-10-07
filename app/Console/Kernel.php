<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\users;
use App\workoff;
use App\workon;
use Carbon\Carbon;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;

use App\Http\Controllers\clockcontroller;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
class Kernel extends ConsoleKernel
{
    /**
     * 你的應用程式提供的 Artisan 指令。
     *
     * @var array
     */

    protected $commands = [
        // Commands\Inspire::class,
       // \App\Console\Commands\TestLog::class,
    ];

    /**
     * 定義應用程式的指令排程。
     *
     * @param  \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {


       $schedule->call('App\Http\Controllers\clockcontroller@wn_check')
        ->dailyAt('10:15');


        $schedule->call('App\Http\Controllers\clockcontroller@wf_check')
            ->dailyAt('20:10');


        $schedule->call('App\Http\Controllers\clockcontroller@store')
            ->weekdays();


    }

}



