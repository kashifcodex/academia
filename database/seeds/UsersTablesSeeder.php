<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
           'name' => 'admin',
            'email' => 'admin@tutelage.com',
            'password' => Hash::make('admin123'),
            'remember_token' =>  str_random(10),
        ]);
    }
}
