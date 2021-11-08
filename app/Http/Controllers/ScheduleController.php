<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules = Schedule::all();
        if($schedules){
            return response()->json($schedules);
        }else{
            return response()->json(['error' => 'Response not found.'], 401);
        }
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $schedule = new Schedule();
        $schedule->scheduling_date = $request->scheduling_date;
        $schedule->user_id = $request->user_id;
        $schedule->employee_id = $request->employee_id;
        $schedule->service_id = $request->service_id;
        $schedule->save();
        if($schedule){
            return response()->json($schedule);
        }else{
            return response()->json(['error' => 'Resource not save.'], 401);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $schedule = Schedule::find($id);

        if($schedule){
            return response()->json($schedule);
        }else{
            return response()->json(['error' => 'Response not found.'], 401);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $schedule = Schedule::find($id);
        $schedule->scheduling_date = $request->scheduling_date;
        $schedule->user_id = $request->user_id;
        $schedule->employee_id = $request->employee_id;
        $schedule->service_id = $request->service_id;
        $schedule->save();

        if($schedule){
            return response()->json($schedule);
        }else{
            return response()->json(['error' => 'Resource not update.'], 401);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $schedule = Schedule::find($id);

        if($schedule){
            $schedule->delete();
            return response()->json($schedule);
        }else{
            return response()->json(['error' => 'Resource not removed.'], 401);
        }
    }
}
