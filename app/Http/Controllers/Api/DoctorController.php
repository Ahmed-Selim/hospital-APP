<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Http\Resources\DoctorResource;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return UserResource::collection(User::where('role_id',2)->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        if (!$request->profile_picture){
            $path = storage_path(). '/app/public/img/'.$request->gender.'.png' ;
            $request->profile_picture = new UploadedFile($path,true) ;
        }
        $request->profile_picture =  '/storage/' . $request->profile_picture->store('uploads', 'public') ;
        $request['role_id'] = 2 ;
        $request['created_at'] = now() ;
        $doctor = User::create($request->validated());
        return new UserResource($request) ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(User $doctor)
    {
        return new UserResource($doctor) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $doctor)
    {
        $request['updated_at'] = now() ;
        $doctor->update($request->validated()) ;
        return new UserResource($doctor) ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $doctor)
    {
        $doctor->delete() ;

        return response()->noContent();
    }
}
