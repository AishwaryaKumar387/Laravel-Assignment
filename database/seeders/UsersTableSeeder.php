<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$FmkXc0NBccMXlCT4C1qJTuPNgzd9vVJTtXguOyNu2kPLaRfi.xHpC',
                'remember_token' => NULL,
                'created_at' => '2023-04-12 05:39:09',
                'updated_at' => '2023-04-12 05:39:09',
            ),
        ));
        
        
    }
}