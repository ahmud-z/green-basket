<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Rap2hpoutre\FastExcel\Facades\FastExcel;

class AmazonProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        (new FastExcel)->import(storage_path('app/amazon-products.csv'), function ($row) {
            $categories = json_decode($row['categories'], true);

            $category = Category::firstOrCreate(['name' => $categories[0]]);

            $category->products()->firstOrCreate([
                'name' => Str::limit($row['title'], 200),
            ],[
                'tags' => $categories,
                'price' => (float) Str::replace('"', "", $row['final_price']),
                'description' => $row['description'],
                'image_path' => $row['image_url'],
                'stock_quantity' => random_int(5, 15),
            ]);
        });
    }
}
