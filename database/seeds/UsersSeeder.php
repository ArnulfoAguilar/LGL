<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(['name' => 'Nelson Alejandro', 'lastname' => 'Saz', 'email' => 'nelsonalejandrosaz@gmail.com', 'username' => 'nelsonalejandrosaz', 'password' => bcrypt('password'),'rol' => '0',]);
    }
}
