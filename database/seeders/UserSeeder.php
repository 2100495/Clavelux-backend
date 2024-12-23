<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create(
            [
                'lname'=>'De la Cruz',
                'fname'=>'Juan',
                'username'=>'juan14',
                'email'=>'juan@email.com',
                'password' => Hash::make('password123')
            ]
            );
    }
}
