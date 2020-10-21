<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Category extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            $jsonString = file_get_contents(__DIR__ . '/category.json');

            $categories = json_decode($jsonString, true);

            foreach($categories as $category) {
                DB::table('categories')->insert([
                    'id' => $category['id'],
                    'name' => $category['name'],
                    'code' => $category['code'],
                    'image' => $category['image'],
                ]);
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
