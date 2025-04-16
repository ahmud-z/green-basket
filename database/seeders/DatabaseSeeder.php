<?php

namespace Database\Seeders;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

//        User::factory()->create([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//        ]);


        $categories = [
            "fragrances",
            "furniture",
            "groceries",
            "home-decoration",
            "kitchen-accessories",
            "skin-care",
            "sunglasses",
        ];

        foreach ($categories as $category) {
            $response = Http::get('https://dummyjson.com/products/category/' . $category . '?limit=1000')->json();

            $category = Category::firstOrCreate([
                'name' => Str::ucfirst(Str::replace('-', ' ', $category)),
            ]);

            foreach ($response['products'] as $product) {
                $product = $category->products()->create([
                    'name' => $product['title'],
                    'tags' => $product['tags'],
                    'price' => $product['price'],
                    'description' => $product['description'],
                    'image_path' => $product['thumbnail'],
                    'stock_quantity' => $product['stock'],
                ]);

                foreach ($product['images'] as $image) {
                    $product->images()->create([
                        'path' => $image,
                    ]);
                }

                foreach ($product['reviews'] as $review) {
                    $product->reviews()->create([
                        'rating' => $review['rating'],
                        'content' => $review['comment'],
                        'reviewer_name' => $review['reviewer_name'],
                        'reviewer_email' => $review['reviewer_email'],
                        'created_at' => Carbon::parse($review['date']),
                    ]);
                }
            }
        }
    }
}
