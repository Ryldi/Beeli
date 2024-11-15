<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // protected $table = 'products';
        // protected $guarded = [];
        // protected $fillable = [
        //     'name', 
        //     'description', 
        //     'price', 
        //     'stock',
        //     'image'
        // ];

        $products = [
            [
                'name' => 'Boneka Wisuda Binus',
                'description' => 'Boneka wisuda dengan atribut khas Binus, hadiah untuk kelulusan.',
                'price' => 150000,
                'stock' => 50,
                'image' => 'boneka.png',
            ],
            [
                'name' => 'Bucket Hat',
                'description' => 'Topi bucket dengan desain simple dan nyaman digunakan.',
                'price' => 75000,
                'stock' => 100,
                'image' => 'topi.png',
            ],
            [
                'name' => 'Lanyard',
                'description' => 'Lanyard praktis untuk menggantungkan ID card atau kunci.',
                'price' => 25000,
                'stock' => 200,
                'image' => 'lanyard.png',
            ],
            [
                'name' => 'Tumbler',
                'description' => 'Tumbler dengan desain elegan, cocok untuk dibawa ke kampus atau kerja.',
                'price' => 90000,
                'stock' => 150,
                'image' => 'tumbler.png',
            ],
        ];

        foreach ($products as $prod) {
            Product::create(array_merge($prod, [
                'image' => file_get_contents(public_path('img/product/'.$prod['image'])),
                'organization_id' => 1,
                'popularity' => 0
            ]));
        }


    }
}
