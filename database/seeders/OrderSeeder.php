<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productIds = Product::all();

        User::all()->each(function ($user) use ($productIds) {
            // Create 500 orders
            Order::factory()
                ->count(1000)
                ->create([
                    'user_id' => $user->id,
                ])
                ->each(function ($order) use ($productIds) {
                    $products = $productIds->random(rand(10, 15));

                    foreach ($products as $product) {
                        OrderItem::create([
                            'order_id' => $order->id,
                            'product_id' => $product->id,
                            'price' => $product->price,
                            'quantity' => rand(1, 5),
                        ]);
                    }
                });
        });


    }
}
