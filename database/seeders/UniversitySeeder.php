<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\University;

class UniversitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            $name = [
                "Universitas Bina Nusantara",
                "Universitas Indonesia",
                "Institut Pertanian Bogor",
                "Universitas Trisakti",
                "Institut Teknologi Bandung"
            ];

            $acronym = [
                "Binus",
                "UI",
                "IPB",
                "Usakti",
                "ITB"
            ];

            $logo = [
                "binus.png",
                "ui.png",
                "ipb.png",
                "trisakti.png",
                "itb.png"
            ];

            for ($i = 0; $i < count($name); $i++) {
                University::create([
                    'name' => $name[$i],
                    'acronym' => $acronym[$i],
                    'logo' => file_get_contents(public_path('img/univ/' . $logo[$i]))
                ]);
            }
        

    }
}
