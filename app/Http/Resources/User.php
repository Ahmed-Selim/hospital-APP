<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\UserRole;

class User extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'name' => $request->name,
            'email' => $request->email,
            // 'password' => bcrypt($request->password),
            'gender' => $request->gender,
            'profile_picture' => $this->storeImage($request->profile_picture),
            'role' => $request->role,
            'specialization' => $request->specialization,
            'doctor_licence_no' => $request->doctor_licence_no,
            'bio' => $request->bio
        ];
    }
}
