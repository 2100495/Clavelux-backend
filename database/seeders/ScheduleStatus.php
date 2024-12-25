<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScheduleStatus extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('schedule_status')->insert([
            [
                'schedule_status' => 'Pending',
            ],
            [
                'schedule_status' => 'Accepted',
            ],
            [
                'schedule_status' => 'Entered',
            ],
            [
                'schedule_status' => 'Denied',
            ],
            ]
            );
    }
}
