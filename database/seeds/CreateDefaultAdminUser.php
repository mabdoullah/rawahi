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


        DB::table('agents')->truncate();
	    $arr = array(
            array('name' => 'agentuser' ,'email' => "agent@rawahi.com",'password' => bcrypt(123456789)
            ,'admin_id'=>1)
        );
        DB::table('agents')->insert($arr);


        // DB::table('embassadors')->truncate();
	    // $arr = array(
        //     array('first_name' => 'embassadoruser','second_name' => 'embassadoruser' ,'email' => "embassador@rawahi.com",'password' => bcrypt(123456789)
        //     ,'agent_id'=>1)
        // );
        // DB::table('embassadors')->insert($arr);

        // DB::table('partners')->truncate();
	    // $arr = array(
        //     array('partner_type'=>1,
        //         'legal_name' => 'partneruser' ,'email' => "partner@rawahi.com",'password' => bcrypt(123456789)
        //     ,'embassador_id'=>1)
        // );
        // DB::table('partners')->insert($arr);

        // DB::table('users')->truncate();
	    // $arr = array(
        //     array('first_name' => 'useruser' ,'email' => "user@rawahi.com",'password' => bcrypt(123456789))
        // );
        // DB::table('users')->insert($arr);
    }
}
