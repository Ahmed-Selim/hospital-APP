<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Resources\AppointmentResource;
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
        return AppointmentResource::collection(Appointment::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AppointmentRequest $request)
    {
        // $appointment = Appointment::create([
        //     "patient_id" => Auth::user()->id,
        //     "doctor_id" => $request->doctor_id,
        //     "start_timestamp" => $request->start_timestamp ,
        //     "end_timestamp" => $request->end_timestamp,
        //     "status_id" => $request->status_id,
        //     "price" => $request->price,
        //     "created_at" => now()
        // ]);
            // return $request->all() ;
        $request['created_at'] = now() ;
        $appointment = Appointment::create($request->validated());
        return new AppointmentResource($appointment) ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        return new AppointmentResource($appointment) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(AppointmentRequest $request, Appointment $appointment)
    {
        // $appointment->update([
        //     "patient_id" => Auth::user()->id,
        //     "doctor_id" => $request->doctor_id,
        //     "start_timestamp" => $request->start_timestamp ,
        //     "end_timestamp" => $request->end_timestamp,
        //     "status_id" => $request->status_id,
        //     "price" => $request->price,
        //     "updated_at" => now()
        // ]);
        $request['updated_at'] = now() ;
        $appointment->update($request->validated()) ;
        return new AppointmentResource($appointment) ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        $appointment->delete() ;
        return response()->noContent();
    }
}
