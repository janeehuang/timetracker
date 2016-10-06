<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDayoffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dayoff', function (Blueprint $table) {

            $table->increments('id');
            $table->tinyInteger('uid');
            $table->date('leave_day');
            $table->enum('leave_typ', ['病假','事假','公假','生理假','休假']);
            $table->string('leave_desc');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('dayoff');
    }
}
