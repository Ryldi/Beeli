<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Organization;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $organizations = [
            [
                'name' => 'Beehive',
                'acronym' => 'Beehive',
                'email' => 'beehive@binus.ac.id',
                'description' => 'Binus official merchandise store',
                'region' => 'Jakarta',
                'logo' => 'beehive.png',	
            ],
            [
                'name' => 'Modeling Club BINUS',
                'acronym' => 'MCB',
                'email' => 'mcb@binus.ac.id',
                'description' => 'A club focused on fashion modeling and confidence building for BINUS students.',
                'region' => 'Jakarta',
                'logo' => '',	
            ],
            [
                'name' => 'Bina Nusantara Computer Club',
                'acronym' => 'BNCC',
                'email' => 'info@bncc.net',
                'description' => 'A student organization focused on technology and IT development.',
                'region' => 'Jakarta',
                'logo' => '',	
            ],
            [
                'name' => 'Paduan Suara Mahasiswa Bina Nusantara',
                'acronym' => 'PARAMABIRA',
                'email' => 'paramabira@binus.ac.id',
                'description' => 'A choir group representing BINUS in national and international events.',
                'region' => 'Jakarta',
                'logo' => '',	
            ],
            [
                'name' => 'Seni Tari Mahasiswa Bina Nusantara',
                'acronym' => 'STAMANARA',
                'email' => 'stamanara@binus.ac.id',
                'description' => 'A club promoting traditional and modern dance.',
                'region' => 'Jakarta',
                'logo' => '',	
            ],
            [
                'name' => 'BINUS English Club',
                'acronym' => 'BNEC',
                'email' => 'bnec@binus.ac.id',
                'description' => 'A platform for students to improve their English proficiency.',
                'region' => 'Jakarta',
                'logo' => '',	
            ],
        ];

        foreach ($organizations as $org) {
            Organization::create(array_merge($org, [
                'phone' => fake()->numerify('08########'),
                'balance' => 0,
                'password' => 'password',
                'popularity' => 0,
                'logo' => $org['logo'] ? file_get_contents(public_path('img/org/'.$org['logo'])) : file_get_contents(public_path('img/univ/binus.png')),
                'university_id' => 1, // Binus ID
            ]));
        }

    }
}
