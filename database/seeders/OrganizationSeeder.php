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
                'description' => 'An official merchandise store by BINUS University that offers a variety of high-quality BINUS-branded products. Beehive aims to provide students, staff, and alumni with unique items that represent BINUS pride and culture, ranging from apparel to everyday essentials.',
                'region' => 'Jakarta',
                'logo' => 'beehive.png',
            ],
            [
                'name' => 'Modeling Club BINUS',
                'acronym' => 'MCB',
                'email' => 'mcb@binus.ac.id',
                'description' => 'A student organization dedicated to fashion modeling and self-confidence development. MCB provides a platform for students to explore their talents, improve their public appearance, and participate in events that enhance their skills in modeling and personal branding.',
                'region' => 'Jakarta',
                'logo' => 'mcb.png',
            ],
            [
                'name' => 'Bina Nusantara Computer Club',
                'acronym' => 'BNCC',
                'email' => 'info@bncc.net',
                'description' => 'An organization focusing on advancing IT and technology skills. BNCC offers various training programs, competitions, and projects that empower students to excel in software development, networking, and other tech-related fields, creating future-ready IT professionals.',
                'region' => 'Jakarta',
                'logo' => 'bncc.png',
            ],
            [
                'name' => 'Seni Tari Mahasiswa Bina Nusantara',
                'acronym' => 'STAMANARA',
                'email' => 'stamanara@binus.ac.id',
                'description' => 'A cultural organization that promotes traditional and modern dance among BINUS students. STAMANARA offers a creative space to celebrate Indonesian heritage while fostering teamwork and artistic growth through performances, workshops, and national cultural events.',
                'region' => 'Jakarta',
                'logo' => 'stamanara.png',
            ],
            [
                'name' => 'Bina Nusantara Swimming Club',
                'acronym' => 'BASIC',
                'email' => 'basic@binus.ac.id',
                'description' => 'A swimming-focused student organization established on January 23, 1998. BASIC helps students develop their swimming skills while encouraging sportsmanship and camaraderie. Guided by BINUS University, it operates free from prohibited influences and political activities, focusing purely on swimming excellence.',
                'region' => 'Jakarta',
                'logo' => 'basic.png',
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
