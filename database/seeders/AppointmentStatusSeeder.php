<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppointmentStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = ["Unconfirmed", "Confirmed", "Cancelled", "Did not attend", "Completed",
                    "Checked in", "Pending", "Postponed", "Payment required"];

        foreach ($status as $s) {
            DB::table('appointment_statuses')->insert([
                'status' => $s,
                'created_at' => now(),
                'updated_at' => now() 
            ]);
        }
    }
}
