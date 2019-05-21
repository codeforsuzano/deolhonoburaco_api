<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call('UsersTableSeeder');
        User::create([
            'name'     => 'Fernando Alves',
            'email'    => 'fer@fer.com',
            'password' => app('hash')->make('123123')
        ]);
    }
}
