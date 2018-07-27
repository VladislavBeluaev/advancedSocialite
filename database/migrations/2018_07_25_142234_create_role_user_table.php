<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('role_user',function(Blueprint $table){
        //$table->increments('id');
        $table->integer('user_id')->unsigned();
        $table->foreign('user_id')->on('users')->references('id')->onDelete('cascade'); //foreign('user_id')->
        $table->integer('role_id')->unsigned();
        $table->foreign('role_id')->on('roles')->references('id')->onDelete('cascade'); //foreign('role_id')->
        $table->primary(['user_id','role_id']);
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_user');
    }
}
