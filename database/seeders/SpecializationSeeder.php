<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $specializations = [
            "Anesthesiology", "Cardiology", "Cardiothoracic Surgery", "Dermatology", "Diagnostic Radiology",
            "Emergency Medicine", "Endocrinology", "Gastroenterology", "General Surgery", "Geriatric Medicine",
            "Hematology", "Hand Surgery", "Infectious Diseases", "Internal Medicine", "Medical Oncology",
            "Neurology", "Neurosurgery", "Nuclear Medicine", "Obstetrics & Gynecology", "Occupational Medicine",
            "Ophthalmology", "Orthopaedic Surgery", "Otorhinolaryngology/ENT", "Pediatric Medicine",
            "Pediatric Surgery", "Pathology", "Plastic Surgery", "Psychiatry", "Public Health",
            "Radiation Oncology", "Rehabilitation Medicine", "Renal Medicine", "Respiratory Medicine",
            "Rheumatology", "Urology"
        ] ;

        foreach ($specializations as $s) {
            DB::table('specializations')->insert([
                'specialization' => $s,
                'created_at' => now(),
                'updated_at' => now() 
            ]);
        }
    }
}
