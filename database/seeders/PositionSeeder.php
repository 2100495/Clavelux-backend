<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\PositionModel;
use Illuminate\Support\Facades\DB;
class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        
        //
        DB::table('position_table')->insert([
            [
                'position' => 'Student',
            ],
            [
                'position' => 'Faculty/Admin',
            ],
            [
                'position' => 'Office',
            ],
            [
                'position' => 'Visitor',
            ],
            [
                'position' => 'Host',
            ]
            ]
            );
    }
}
