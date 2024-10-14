<?php

namespace Database\Seeders;

use App\Models\Estudiante;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tutor;
use App\Models\Plan;
use App\Models\Reunion;
use App\Models\Seguimiento;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    { 
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
       User::factory(10)->create();
       Tutor::factory(30)->create();
       Plan::factory(20)->create();
       Reunion::factory(10)->create();
       Seguimiento::factory(10)->create();
       Estudiante::factory(10)->create();
    }
}
