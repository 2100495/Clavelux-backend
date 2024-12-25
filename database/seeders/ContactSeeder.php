<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contact = [
            [
                'email' => '1234567@ub.edu.ph',
                'password' => 'aX2d!9Kw',
                'fname' => 'John',
                'lname' => 'Smith',
                'position_id' => 2,
            ],
            [
                'email' => '7654321@ub.edu.ph',
                'password' =>'E@b5nHg3',
                'fname' => 'Alice',
                'lname' => 'Johnson',
                'position_id' => 3,
            ],
            [
                'email' => '2345678@ub.edu.ph',
                'password' =>'7tJs$2Hp',
                'fname' => 'Michael',
                'lname' => 'Williams',
                'position_id' => 4,
            ],
            [
                'email' => '8765432@ub.edu.ph',
                'password' => 'pS8d#L2m',
                'fname' => 'Sophia',
                'lname' => 'Jones',
                'position_id' => 2,
            ],
            [
                'email' => '3456789@ub.edu.ph',
                'password' => 'Fg5t!wLp',
                'fname' => 'David',
                'lname' => 'Brown',
                'position_id' => 3,
            ],
            [
                'email' => '9876543@ub.edu.ph',
                'password' => 'tR3@7zQf',
                'fname' => 'Emma',
                'lname' => 'Davis',
                'position_id' => 4,
            ],
            [
                'email' => '4567890@ub.edu.ph',
                'password' =>'9Qd#x8Er',
                'fname' => 'James',
                'lname' => 'Miller',
                'position_id' => 2,
            ],
            [
                'email' => '1029384@ub.edu.ph',
                'password' => 'L#r8Bz2A',
                'fname' => 'Olivia',
                'lname' => 'Wilson',
                'position_id' => 3,
            ],
            [
                'email' => '4839201@ub.edu.ph',
                'password' => '9dTk1n!A',
                'fname' => 'William',
                'lname' => 'Moore',
                'position_id' => 4,
            ],
            [
                'email' => '5678901@ub.edu.ph',
                'password' => 'uG1m$Ew2',
                'fname' => 'Ava',
                'lname' => 'Taylor',
                'position_id' => 2,
            ],
            [
                'email' => '1982734@ub.edu.ph',
                'password' => 'Hq7e#sZ3',
                'fname' => 'Benjamin',
                'lname' => 'Anderson',
                'position_id' => 3,
            ],
            [
                'email' => '6748392@ub.edu.ph',
                'password' => 'T5o@2zXw',
                'fname' => 'Mia',
                'lname' => 'Thomas',
                'position_id' => 4,
            ],
            [
                'email' => '8392017@ub.edu.ph',
                'password' =>'aJ8s$Dp4',
                'fname' => 'Samuel',
                'lname' => 'Jackson',
                'position_id' => 2,
            ],
            [
                'email' => '1928374@ub.edu.ph',
                'password' => 'wJ3t!BzQ',
                'fname' => 'Isabella',
                'lname' => 'White',
                'position_id' => 3,
            ],
            [
                'email' => '5738291@ub.edu.ph',
                'password' => 'P@9sL3rR',
                'fname' => 'Daniel',
                'lname' => 'Harris',
                'position_id' => 4,
            ],
        ];
           

        DB::table('contact')->insert($contact);
        
        //
    }
}
