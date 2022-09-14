<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::firstOrCreate(['id'=>1], ['name'=>'admin', 'username' => 'admin', 'password'=> Hash::make('admin'), 'email'=>'admin@gmail.com']);
    }
}