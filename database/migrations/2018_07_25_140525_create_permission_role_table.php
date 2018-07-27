<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('permission_role',function(Blueprint $table){
        //$table->increments('id');
        $table->integer('role_id')->unsigned();
        $table->foreign('role_id')->on('roles')->references('id')->onDelete('cascade');
        $table->integer('permission_id')->unsigned();
        $table->foreign('permission_id')->on('permissions')->references('id')->onDelete('cascade'); //foreign('permission_id')->
        $table->primary(['permission_id','role_id']);
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permission_role');
    }
}
