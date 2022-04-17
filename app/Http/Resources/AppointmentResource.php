<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\AppointmentStatus;
use App\Models\User;

class AppointmentResource extends JsonResource
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
            "patient_id" => $this->patient_id ,
            "doctor_id" => $this->doctor_id ,
            "start_timestamp" => $this->start_timestamp ,
            "end_timestamp" => $this->end_timestamp ,
            "status_id" => $this->status_id ,
            "price" => $this->price ,
            'doctor' => new UserResource($this->whenLoaded('doctor')),
            'patient' => new UserResource($this->whenLoaded('patient'))
        ] ;
    }
}
