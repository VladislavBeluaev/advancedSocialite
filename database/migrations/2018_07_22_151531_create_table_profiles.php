<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProfiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('Address')->nullable();
            $table->string('gender')->nullable();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->on('users')->references('id'); //foreign('user_id')->
            $table->integer('social_id')->unsigned();
            $table->foreign('social_id')->on('social_profiles')->references('id'); //foreign('social_id')->
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
        Schema::dropIfExists('profiles');
    }
}
