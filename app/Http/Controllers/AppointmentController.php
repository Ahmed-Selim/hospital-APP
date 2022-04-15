<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Http\Requests\AppointmentRequest;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointments = Appointment::all();
        return response()->json($appointments) ;

        // return view('appointments.index', compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\AppointmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AppointmentRequest $request)
    {
        $appointment = Appointment::create([
            "patient_id" => Auth::user()->id,
            "doctor_id" => $request->doctor_id,
            "start_timestamp" => $request->start_timestamp ,
            "end_timestamp" => $request->end_timestamp,
            "status_id" => $request->status_id,
            "price" => $request->price,
            "created_at" => now()
        ]);

        return response()->json($appointment);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        return response()->json($appointment);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        //return view()->with();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\AppointmentRequest  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(AppointmentRequest $request, Appointment $appointment)
    {
        $appointment->update([
            "patient_id" => Auth::user()->id,
            "doctor_id" => $request->doctor_id,
            "start_timestamp" => $request->start_timestamp ,
            "end_timestamp" => $request->end_timestamp,
            "status_id" => $request->status_id,
            "price" => $request->price,
            "updated_at" => now()
        ]);

        return response()->json($appointment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        if ( $appointment->delete() ) {
            return response()->json([
                'message' => 'Patient deleted successfully!'
            ]);
        }
    }
}
