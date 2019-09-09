<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePartnersTable extends Migration {

	public function up()
	{
		Schema::create('partners', function(Blueprint $table) {
			$table->increments('id');
			$table->string('partner_type');
			$table->string('map_address');
			$table->decimal('lat', 10, 7);
			$table->decimal('lng', 10, 7);
			$table->string('legal_name');
			$table->string('representative_name');
			$table->string('email')->unique();
			$table->integer('phone')->unique()->nullable();
			$table->string('phone_key')->nullable();
			$table->string('logo')->nullable();
			$table->string('services')->nullable();
			$table->string('subscription_type')->nullable();
			$table->integer('embassador_id')->unsigned();
			$table->rememberToken();
            $table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('partners');
	}
}
