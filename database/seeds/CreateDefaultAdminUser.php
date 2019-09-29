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


        // DB::table('agents')->truncate();
	    // $arr = array(
        //     array('name' => 'agentuser' ,'email' => "agent@rawahi.com",'password' => bcrypt(123456789)
        //     ,'admin_id'=>1)
        // );
        // DB::table('agents')->insert($arr);


        // DB::table('ambassadors')->truncate();
	    // $arr = array(
        //     array('first_name' => 'ambassadoruser','second_name' => 'ambassadoruser' ,'email' => "ambassador@rawahi.com",'password' => bcrypt(123456789)
        //     ,'agent_id'=>1)
        // );
        // DB::table('ambassadors')->insert($arr);

        // DB::table('partners')->truncate();
	    // $arr = array(
        //     array('partner_type'=>1,
        //         'legal_name' => 'partneruser' ,'email' => "partner@rawahi.com",'password' => bcrypt(123456789)
        //     ,'ambassador_id'=>1)
        // );
        // DB::table('partners')->insert($arr);

        // DB::table('users')->truncate();
	    // $arr = array(
        //     array('first_name' => 'useruser' ,'email' => "user@rawahi.com",'password' => bcrypt(123456789))
        // );
        // DB::table('users')->insert($arr);
    }
}
