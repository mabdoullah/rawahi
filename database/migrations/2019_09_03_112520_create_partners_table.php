<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePartnersTable extends Migration {

	public function up()
	{
		Schema::create('partners', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('ambassadorID')->unsigned();
			$table->string('partner_type');
			$table->string('location');
			$table->string('legal_name');
			$table->string('representative_name');
			$table->string('email')->unique();
			$table->tinyInteger('phone')->unique();
			$table->string('logo');
			$table->string('services');
			$table->string('subscription_type');
			$table->boolean('submit');
		});
	}

	public function down()
	{
		Schema::drop('partners');
	}
}
