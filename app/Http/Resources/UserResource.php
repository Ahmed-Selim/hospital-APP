<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Specialization;

class UserResource extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email ,
            'password' => $this->password ,
            'gender' => $this->gender ,
            'role_id' => $this->role_id ,
            'doctor_spec_id' => $this->doctor_spec_id ,
            'profile_picture' => $this->profile_picture ,
            'doctor_licence_no' => $this->doctor_licence_no ,
            'bio' => $this->bio,
        ];
    }
}
