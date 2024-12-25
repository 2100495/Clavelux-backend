<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Notification;

use App\Models\ContactModel;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;
class ScheduleController extends Controller
{
    //
    public function schedule(Request $request){

        //Validate
 

        // $status = Validator::make($request->all(),
        //     [
        //         'visitor_id' => 'required',
        //         'position_id' => 'required',
        //         'schedule_status_id' => 'required',
        //         'email' => 'required',
        //         'visitor_purpose' => 'required',
        //         'visit_date' => 'required',
        //         'visit_time' => 'required',
                
               
        //     ]
        //     );
        
        // if($status->fails()){
        //     return response()->json(
        //         [
        //             'message' => 'Please fill all required field',
        //             'data'=>$request->all()
        //         ],406
        //     );
        // }
     
        $id = 0;
        $user = DB::table('contact')->where('email', $request->email)->first();
        if ($user) {
           $id = $user->contact_id;
        } else {
            return response()->json(['message' => 'Email does not exist'],401);
        }
        
        // $check_email = DB::table('contact')
        //     ->select('email') // Specify columns to fetch
        //     ->where('contact_id', $request->contact_id) // Add a condition
        //     ->exists();

        // if(!$check_email){
        //     return "Contact does not exist";
        // }
        // Add Data
        $formattedDate = Carbon::parse($request->visit_date)->format('Y-m-d');
        $formattedTime = Carbon::parse($request->visit_time)->format('H:i:s');
        Schedule::insert(
            [
                'visitor_id' => $request->visitor_id,
                // 'visitor_fname' => $request->visitor_fname,
                // 'visitor_lname' => $request->visitor_lname,

                'contact_id' => $id,
                'position_id' => $request->position_id,
                'visitor_purpose' => $request->visitor_purpose,

                'visit_date' => $formattedDate,
                'visit_time' =>$formattedTime,
                'schedule_status_id' => $request->schedule_status_id,
                
            ]
        );
        return response()->json([
            'message' => 'Schedule Added Successfully',
            'status' => 200,
        ]);

    }



    public function schedule_action(Request $request){
        $validateInput = Validator::make($request->all(),
        [
            'schedule_id' => 'required',
            'schedule_status_id' => 'required',
            // 'visitor_id' => 'required'
        ]
        );

        if($validateInput->fails()){
            return response()->json(
                [
                    'message' => 'Please fill all required field'
                ],406
            );
        }

        DB::table('schedule')
        ->where('schedule_id', $request->schedule_id) // Specify the condition
        ->update([
            'schedule_status_id' => $request->schedule_status_id,
        ]);

        return response()->json(
            [
                'message' => 'Schedule Updated Successfully'
            ],200
        );
    }


    // Pending Schedule
    public function get_schedule( $visitor_id){

        // $data = DB::table('schedule')->get();
        $data = DB::table('schedule')
        ->join('contact', 'schedule.contact_id', '=', 'contact.contact_id') // Adjust the table and column names
        ->join('schedule_status', 'schedule_status.schedule_status_id', '=', 'schedule.schedule_status_id')
        ->select('schedule.*','contact.*','schedule_status.schedule_status') // Select columns you need
        ->where('schedule.visitor_id','=',$visitor_id)
        ->get();
        return response()->json($data);
    }

    // All Schedule
    public function get_all_schedule_contact( $contact_id){

        // $data = DB::table('schedule')->get();
        $data = DB::table('schedule')
        ->join('schedule_status', 'schedule_status.schedule_status_id', '=', 'schedule.schedule_status_id')
        ->join('users', 'users.visitor_id', '=', 'schedule.visitor_id')
        ->select('schedule.*','users.fname','users.lname','users.email','schedule_status.schedule_status') // Select columns you need
        ->where('schedule.contact_id','=',$contact_id)
        ->get();
        return response()->json($data);
    }

     // Pending Schedule
    public function get_schedule_contact( $contact_id){

        // $data = DB::table('schedule')->get();
        $data = DB::table('schedule')
        ->join('schedule_status', 'schedule_status.schedule_status_id', '=', 'schedule.schedule_status_id')
        ->join('users', 'users.visitor_id', '=', 'schedule.visitor_id')
        ->select('schedule.*','users.fname','users.lname','users.email','schedule_status.schedule_status') // Select columns you need
        ->where('schedule.contact_id','=',$contact_id)
        ->where('schedule.schedule_status_id','=',1)
        ->get();
        return response()->json($data);
    }

    // Accepted Schedule
    public function schedule_accepted(Request $request, $contact_id){
        $data = DB::table('schedule')
        ->join('schedule_status', 'schedule_status.schedule_status_id', '=', 'schedule.schedule_status_id')
        ->join('users', 'users.visitor_id', '=', 'schedule.visitor_id')
        ->select('schedule.*','users.fname','users.lname','users.email','schedule_status.schedule_status') // Select columns you need
        ->where('schedule.contact_id','=',$contact_id)
        ->where('schedule.schedule_status_id','=',2)
        ->get();
        return response()->json($data);
    }

     // Rejected Schedule
    public function schedule_denied(Request $request, $contact_id){
        $data = DB::table('schedule')
        ->join('schedule_status', 'schedule_status.schedule_status_id', '=', 'schedule.schedule_status_id')
        ->join('users', 'users.visitor_id', '=', 'schedule.visitor_id')
        ->select('schedule.*','users.fname','users.lname','schedule_status.schedule_status') // Select columns you need
        ->where('schedule.contact_id','=',$contact_id)
        ->where('schedule.schedule_status_id','=',4)
        ->get();
        return response()->json($data);
    }

    public function accept_schedule(Request $request){

        DB::table('schedule')
            ->where('schedule_id', $request->schedule_id)
            ->update(['schedule_status_id' => 2]);
        return response()->json(['message' => 'Updated Successfully']);


    }
    public function deny_schedule(Request $request){
        DB::table('schedule')
        ->where('schedule_id', $request->schedule_id)
        ->update(['schedule_status_id' => 4]);
        return response()->json(['message' => 'Updated Successfully']);
    }
}
