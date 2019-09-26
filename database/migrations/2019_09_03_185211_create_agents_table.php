<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 18);
            $table->string('email')->unique();
            $table->string('phone')->unique()->nullable();
            $table->string('phone_key')->nullable();
            $table->integer('country')->nullable();
            $table->integer('city')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('password');
            $table->integer('admin_id');
            $table->boolean('verified')->default(false);

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
        Schema::dropIfExists('agents');
    }
}
