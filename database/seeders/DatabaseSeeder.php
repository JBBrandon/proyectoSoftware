<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tutor;
use App\Models\Plan;
use App\Models\Reunion;
use App\Models\Seguimiento;
use App\Models\Estudiantes;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       User::factory(10)->create();
       Tutor::factory(30)->create();
       Plan::factory(20)->create();
       Reunion::factory(10)->create();
       Seguimiento::factory(10)->create();
    }
}
