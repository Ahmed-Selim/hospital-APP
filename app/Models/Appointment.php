<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $with = ['doctor', 'patient', 'status'] ;

    protected $fillable = [
        "patient_id" ,
        "doctor_id" ,
        "start_timestamp" ,
        "end_timestamp" ,
        "status_id" ,
        "price" ,
    ];

    public function status() {
        return $this->belongsTo(AppointmentStatus::class);
    }

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id', 'id');
    }

    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id', 'id');
    }
}
