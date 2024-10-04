<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tutor;

class TutorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Tutor = new Tutor();

        $Tutor->nombre = 'Patito Juan Boris';
        $Tutor->email = 'boris@continental.edu.pe';
        $Tutor->telefono = '984254412';
        
        $Tutor->save();
    }
}
