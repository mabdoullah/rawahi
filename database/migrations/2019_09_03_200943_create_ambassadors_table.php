<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAmbassadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ambassadors', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('first_name', 18);
          $table->string('second_name', 18);
          $table->string('email')->unique();
          $table->string('phone')->unique()->nullable();
          $table->string('phone_key')->nullable();
          $table->integer('country')->nullable();
          $table->integer('city')->nullable();
          $table->date('birth_date')->nullable();
          $table->string('password');
          $table->integer('agent_id');
          $table->boolean('verified')->default(false);
          $table->string('generate_id')->unique()->nullable();
         

          $table->rememberToken();
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
        Schema::dropIfExists('ambassadors');
    }
}
