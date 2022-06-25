<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $des = 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut. Erat lorem duo dolor no sea nonumy. Accus labore stet, est lorem sit diam sea et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.';
        $products = [
            [
                'name' => 'Cardigan Anak Biru',
                'description' => $des,
                'image' => 'http://127.0.0.1:8000/img/product-2.jpg',
                'price' => 130000,
                'stock' => 25
            ],
            [
                'name' => 'Men Jacket  Black',
                'description' => $des,
                'image' => 'http://127.0.0.1:8000/img/product-3.jpg',
                'price' => 140000,
                'stock' => 250
            ],
            [
                'name' =>  'Dress Women Black',
                'description' => 'Google Pixel Brand ' . $des,
                'image' => 'http://127.0.0.1:8000/img/product-4.jpg',
                'price' => 160000,
                'stock' => 250
            ],
            [
                'name' => 'Men Tuxedo Black ',
                'description' => $des,
                'image' => 'http://127.0.0.1:8000/img/product-6.jpg',
                'price' => 139000,
                'stock' => 150
            ],
            [
                'name' => 'Colorful Stylish Shirt 5',
                'description' => $des,
                'image' => 'http://127.0.0.1:8000/img/product-7.jpg',
                'price' => 147000,
                'stock' => 251
            ],
            [
                'name' =>  'Colorful Stylish Shirt 6',
                'description' => 'Google Pixel Brand ' . $des,
                'image' => 'http://127.0.0.1:8000/img/product-8.jpg',
                'price' => 65000,
                'stock' => 210
            ],
            [
                'name' =>  'Colorful Stylish Child Shirt ',
                'description' => 'LG Brand ' . $des,
                'image' => 'http://127.0.0.1:8000/img/product-5.jpg',
                'price' => 104000,
                'stock' => 150
            ],
            [
                'name' =>  'Colorful Stylish Child Shirt ',
                'description' => 'LG Brand ' . $des,
                'image' => 'http://127.0.0.1:8000/img/product-5.jpg',
                'price' => 174000,
                'stock' => 50
            ],
            [
                'name' =>  'Colorful Stylish Shirt 9',
                'description' => 'LG Brand ' . $des,
                'image' => 'http://127.0.0.1:8000/img/product-9.jpg',
                'price' => 162000,
                'stock' => 20
            ]
        ];

        foreach ($products as $key => $value) {
            Product::create($value);
        }
    }
}
