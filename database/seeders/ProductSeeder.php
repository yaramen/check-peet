<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            $jsonString = file_get_contents(__DIR__ . '/product.json');

            $products = json_decode($jsonString, true);

            foreach($products as $product) {
                DB::table('products')->insert([
                    'categoryId' => $product['categoryId'],
                    'name' => $product['name'],
                    'code' => $product['code'],
                    'protein' => $product['protein'] ?: 0,
                    'fat' => $product['fat'] ?: 0,
                    'carbohydrate' => $product['carbohydrate'] ?: 0,
                    'calories' => $product['calories'] ?: 0,
                    'image' => $product['imageUrl'],
                    'description' => $product['text'],
                ]);
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
