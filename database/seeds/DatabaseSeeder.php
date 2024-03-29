<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(CreateDefaultAdminUser::class);
        
        $this->call(CountriesCreator::class);

        $this->call(CitiesCreator::class);

        // $this->call(CountryTableSeeder::class);


    }
}
