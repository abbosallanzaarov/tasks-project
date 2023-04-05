<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        User::create([
            'name'=> 'Muhammad',
            'email'=>'muhammdlive7858@gmail.com',
            'password'=> Hash::make('muhammad')
        ]);
        User::create([
            'name'=> 'Abbos',
            'email'=>'allanazorovabbos@gmail.com',
            'password'=> Hash::make('abbos7677'),
            'role' => 0
        ]);
    }
}
