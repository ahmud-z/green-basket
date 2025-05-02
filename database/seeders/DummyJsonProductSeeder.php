<?php

namespace Database\Seeders;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class DummyJsonProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            "beauty",
            "fragrances",
            "furniture",
            "groceries",
            "home-decoration",
            "kitchen-accessories",
            "laptops",
            "mens-shirts",
            "mens-shoes",
            "mens-watches",
            "mobile-accessories",
            "motorcycle",
            "skin-care",
            "smartphones",
            "sports-accessories",
            "sunglasses",
            "tablets",
            "tops",
            "vehicle",
            "womens-bags",
            "womens-dresses",
            "womens-jewellery",
            "womens-shoes",
            "womens-watches"
        ];

        foreach ($categories as $category) {
            $response = Http::get('https://dummyjson.com/products/category/'.$category.'?limit=1000')->json();

            $category = Category::firstOrCreate([
                'name' => Str::ucfirst(Str::replace('-', ' ', $category)),
            ]);

            foreach ($response['products'] as $product) {
                $dbProduct = $category->products()->create([
                    'name' => $product['title'],
                    'tags' => $product['tags'],
                    'price' => $product['price'],
                    'description' => $product['description'],
                    'image_path' => $product['thumbnail'],
                    'stock_quantity' => $product['stock'],
                ]);

                foreach ($product['images'] as $image) {
                    $dbProduct->images()->create([
                        'path' => $image,
                    ]);
                }

                foreach ($product['reviews'] as $review) {
                    $dbProduct->reviews()->create([
                        'rating' => $review['rating'],
                        'content' => $review['comment'],
                        'reviewer_name' => $review['reviewerName'],
                        'reviewer_email' => $review['reviewerEmail'],
                        'created_at' => Carbon::parse($review['date']),
                    ]);
                }
            }
        }
    }
}
