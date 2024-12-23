<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Notification;
use Illuminate\Support\Facades\Validator;

class ScheduleController extends Controller
{
    //
    public function schedule(Request $request){

        //Validate
        $status = Validator::make($request->all(),
            [
                'user_id' => 'required',
                'visitor_fname' => 'required',
                'visitor_lname' => 'required',
                'host_email' => 'required',
                'host_status' => 'required',
                'visitor_purpose' => 'required',
                'visit_date' => 'required',
                'visit_time' => 'required',
            ]
            );
        
        if($status->fails()){
            return response()->json(
                [
                    'message' => 'Please fill all required field'
                ],406
            );
        }
        
        // Add Data
        Schedule::insert(
            [
                'user_id' => $request->user_id,
                'visitor_fname' => $request->visitor_fname,
                'visitor_lname' => $request->visitor_lname,
                'host_email' => $request->host_email,
                'host_status' => $request->host_status,
                'visitor_purpose' => $request->visitor_purpose,
                'visit_date' => $request->visit_date,
                'visit_time' => $request->visit_time,
                
            ]
        );
        $latest_sched_id = Schedule::latest()->pluck('schedule_id')->first();

        Notification::insert(
            [
                'user_id' => $request->user_id,
                'schedule_id' => $latest_sched_id,
                'status' => "Pending",
                'date' =>$request->visit_date,
                'time' =>$request->visit_time
            ]
            );
        return response()->json([
            'message' => 'Added Successfully',
            'status' => 200,
        ]);
    }
}
