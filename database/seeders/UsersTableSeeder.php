<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    
    public function run(): void
    {
        User::create([
            'name'=>'Likhoni',
            'email'=>'likhoni@gmail.com',
            'password'=>bcrypt('123456')
        ]);
    }
}
