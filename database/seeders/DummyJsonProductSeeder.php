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
            "beauty" => "https://freepngimg.com/thumb/makeup/166283-luxury-cosmetics-png-free-photo-thumb.png",
            "fragrances" => "https://freepngimg.com/thumb/perfume/4-2-perfume-png-hd-thumb.png",
            "furniture" => "https://freepngimg.com/thumb/armchair/62-armchair-png-image-thumb.png",
            "groceries" => "https://freepngimg.com/thumb/healthy_food/9-2-healthy-food-png-picture-thumb.png",
            "home-decoration" => "https://freepngimg.com/thumb/coffee/62185-coffee-cup-tea-chocolate-machine-hot-starbucks-thumb.png",
            "kitchen-accessories" => "https://freepngimg.com/thumb/kettle/161081-kettle-silver-free-photo-thumb.png",
            "laptops" => "https://nest-frontend-v6.vercel.app/assets/imgs/theme/icons/category-1.svg",
            "mens-shirts" => "https://freepngimg.com/thumb/tshirt/36652-7-grey-t-shirt-thumb.png",
            "mens-shoes" => "https://freepngimg.com/thumb/running_shoes/1-running-shoes-png-image-thumb.png",
            "mens-watches" => "https://nest-frontend-v6.vercel.app/assets/imgs/theme/icons/category-1.svg",
            "mobile-accessories" => "https://freepngimg.com/thumb/apple/85265-case-apple-mobile-phone-plus-iphone-device-thumb.png",
            "motorcycle" => "https://freepngimg.com/thumb/motorcycle/36575-7-ducati-photo-thumb.png",
            "skin-care" => "https://freepngimg.com/thumb/mario/121416-mario-badescu-care-skin-png-file-hd-thumb.png",
            "smartphones" => "https://freepngimg.com/thumb/apple/85265-case-apple-mobile-phone-plus-iphone-device-thumb.png",
            "sports-accessories" => "https://freepngimg.com/thumb/sports_equipment/22587-6-sport-picture-thumb.png",
            "sunglasses" => "https://freepngimg.com/thumb/sunglasses/74988-goggles-sunglasses-free-download-png-hq-thumb.png",
            "tablets" => "https://nest-frontend-v6.vercel.app/assets/imgs/theme/icons/category-1.svg",
            "tops" => "https://nest-frontend-v6.vercel.app/assets/imgs/theme/icons/category-1.svg",
            "vehicle" => "https://freepngimg.com/thumb/jeep/42017-1-jeep-download-image-png-image-high-quality-thumb.png",
            "womens-bags" => "https://freepngimg.com/thumb/women_bag/15-leather-women-bag-png-image-thumb.png",
            "womens-dresses" => "https://freepngimg.com/thumb/nina_dobrev/12-2-nina-dobrev-png-clipart-thumb.png",
            "womens-jewellery" => "https://freepngimg.com/thumb/jewelry/38-diamond-earrings-png-image-thumb.png",
            "womens-shoes" => "https://freepngimg.com/thumb/shoes/150282-high-heels-shoe-download-free-image-thumb.png",
            "womens-watches" => "https://nest-frontend-v6.vercel.app/assets/imgs/theme/icons/category-1.svg",
        ];

        foreach ($categories as $name => $categoryImage) {
            $response = Http::get('https://dummyjson.com/products/category/'.$name.'?limit=1000')->json();

            $category = Category::firstOrCreate([
                'name' => Str::ucfirst(Str::replace('-', ' ', $name)),
                'image_path' => $categoryImage,
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
