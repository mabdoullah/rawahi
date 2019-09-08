<?php

use Illuminate\Database\Seeder;

class CreateDefaultAdminUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Admin::create(
            [
                'name'=> 'Admin','email'=>'admin@admin.com','password'=>bcrypt(123456789)
            ]
        );
    }
}
