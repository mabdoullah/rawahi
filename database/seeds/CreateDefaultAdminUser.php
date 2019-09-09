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
        DB::table('admins')->truncate();
	    $arr = array(
            array('name' => 'Admin' ,'email' => "admin@rawahi.com",'password' => bcrypt(123456789))
        );

        DB::table('admins')->insert($arr);
    }
}
