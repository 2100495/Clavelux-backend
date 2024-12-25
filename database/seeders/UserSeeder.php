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
        // User::create(
        //     [
        //         'lname'=>'De la Cruz',
        //         'fname'=>'Juan',
        //         'username'=>'juan14',
        //         'email'=>'juan@email.com',
        //         'password' => Hash::make('password123')
        //     ]
        //     );
        $users = [
            [
                'fname' => 'Liam',
                'lname' => 'Walker',
                'email' => 'liam.walker@gmail.com',
                'username' => 'LiamWalker',
                'password' => Hash::make('T!g6pXf8'), // Always hash the password
                'position_id' => 5
            ],
            [
                'fname' => 'Charlotte',
                'lname' => 'Adams',
                'email' => 'charlotte.adams@gmail.com',
                'username' => 'CharlotteAdams',
                'password' => Hash::make('zR7pQ@kM'),
            
                'position_id' => 5
            ],
            [
                'fname' => 'Ethan',
                'lname' => 'Davis',
                'email' => 'ethan.davis@gmail.com',
                'username' => 'EthanDavis',
                'password' => Hash::make('wL9y@Np5'),
                'position_id' => 5
            ],
            [
                'fname' => 'Grace',
                'lname' => 'Morris',
                'email' => 'grace.morris@gmail.com',
                'username' => 'GraceMorris',
                'password' => Hash::make('H@7wJ9dF'),
                'position_id' => 5
            ],
        ];

        // Insert the users into the database
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
