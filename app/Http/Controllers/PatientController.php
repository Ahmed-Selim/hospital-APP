<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\PatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use Illuminate\Http\UploadedFile;

class PatientController extends Controller
{
    public function index()
    {
        $patients = User::where('role_id', 3)->get() ;
        return $patients ;
        // return view('patients.index', compact('patients'));
    }

    public function create()
    {
        // return view();
    }

   
    public function store(Request $request)
    {
        
        $request->validate([
            'name' => ['required', 'min:4'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:4'],
            'gender' => ['required', 'in:Male,Female'],
            'profile_picture' => ['image']
        ]);
        
        if (!$request->profile_picture){
            $path = storage_path(). '/app/public/img/'.$request->gender.'.png' ;
            $request->profile_picture = new UploadedFile($path,true) ;
        }
        
        $patient = User::create([
            'name' => ucwords($request->name),
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'gender' => $request->gender,
            'profile_picture' => $this->storeImage($request->profile_picture),
            'role_id' => 3,
            'created_at' => now()
        ]);
                
        return $patient ;
    }

    public function show(User $patient)
    {
        if ($this->index()->contains('id', $patient->id))
            return response()->json($patient);
    }

    
    public function edit(User $patient)
    {
        //return view() ;
    }

    
    public function update(Request $request, User $patient)
    {
        $request->validate([
            'name' => ['min:4'],
            'email' => ['email'],
            'password' => ['min:4'],
            'gender' => ['in:Male,Female']
        ]);

        $patient->update([
            'name' => ucwords($request->name) ,
            'email' => $request->email ,
            'password' => bcrypt($request->password),
            'gender' => $request->gender ,
            'role_id' => $request->role_id,
            'doctor_spec_id' => $request->doctor_spec_id,
            'doctor_licence_no' => $request->doctor_licence_no,
            'bio' => $request->bio,
            'updated_at' => now()
        ]);
        // $patient->fill($request->all())->save();
        return $patient;

        return response()->json($patient);
    }

    
    public function destroy(User $patient)
    {
        if ( $patient->delete() ) {
            return response()->json([
                'message' => 'Patient deleted successfully!'
            ]);
        }
    }

    private function storeImage ($image) {
        $imagePath = $image->store('uploads', 'public') ;
        return '/storage/' . $imagePath ;
    }
}
