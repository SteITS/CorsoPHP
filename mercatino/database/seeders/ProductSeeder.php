<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // Example products
        $products = [
            [
                'name' => 'Smoking bird on fire',
                'description' => 'Not smoking, just joking',
                'price' => 1200.99,
                'category_id' => 1, 
                'user_id' => 1,     
                'image' => 'uploads/1731150236_Stefan Stanescu.jpg',
            ],
            [
                'name' => 'Story of the Kiwi',
                'description' => 'A fruit or a bird? Let\'s discover the truth',
                'price' => 899.99,
                'category_id' => 3, // Replace with a valid category ID
                'user_id' => 2,     // Replace with a valid user ID
                'image' => 'uploads/1731257712_6.jpg',
            ],
            [
                'name' => 'Summer Outfit',
                'description' => 'Very cool, very light',
                'price' => 19.99,
                'category_id' => 2, // Replace with a valid category ID
                'user_id' => 3,     // Replace with a valid user ID
                'image' => 'uploads/1731261278_5.jpg',
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}