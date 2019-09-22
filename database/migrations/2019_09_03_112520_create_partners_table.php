<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePartnersTable extends Migration {

	public function up()
	{
		Schema::create('partners', function(Blueprint $table) {
			$table->increments('id');
			$table->string('partner_type')->nullable();
	
			$table->integer('city')->nullable();
			$table->text('about')->nullable();
			$table->string('postel_code')->nullable();
			$table->string('map_address')->nullable();
			$table->decimal('lat', 10, 7)->nullable();
			$table->decimal('lng', 10, 7)->nullable();
			$table->string('legal_name')->nullable();
			$table->string('representative_name')->nullable();
			$table->string('email')->unique();
			$table->string('phone')->unique()->nullable();
			$table->string('phone_key')->nullable();
			$table->string('image')->nullable();
			$table->string('services')->nullable();
			$table->string('password')->nullable();
			$table->string('facebook')->nullable();
			$table->string('instagram')->nullable();
			$table->string('twitter')->nullable();


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
