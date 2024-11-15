<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student::create([
            'email' => 'student@binus.ac.id',
            'password' => 'password',	
            'username' => 'Student',
            'phone' => '0888888888'
        ]);
    }
}
