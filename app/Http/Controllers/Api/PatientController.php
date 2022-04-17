<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Http\Requests\UserRequest;
use Illuminate\Http\UploadedFile;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = User::where('role_id', 3)->get() ;
        return UserResource::collection($patients) ;
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
        $request['role_id'] = 3 ;
        $request['created_at'] = now() ;
        $patient = User::create($request->validated());
        return new UserResource($patient) ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $patient)
    {
        return new UserResource($patient) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $patient)
    {

        $request['updated_at'] = now() ;
        $patient->update($request->validated());
        return new UserResource($patient) ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $patient)
    {
        $patient->delete() ;
        return response()->noContent();
    }
}
