<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmbassadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('embassadors', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('firstname', 18);
          $table->string('secoundname', 18);
          $table->string('email')->unique();
          $table->integer('phonenumber')->unique();
          $table->string('code_country');
          $table->string('country');
          $table->string('city');
          $table->date('dateofbirth');
          $table->string('password');
          $table->string('confirmpassword');
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
        Schema::dropIfExists('embassadors');
    }
}
