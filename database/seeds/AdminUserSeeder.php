<?php

use App\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        User::create([
            'name' => 'admin',
            'email' => 'admin@admin',
            'level'=>'admin',
            'password' => bcrypt('11111111'),
        ]);
    }
}
