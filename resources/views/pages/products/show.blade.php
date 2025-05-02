@extends('layouts.default')

@section('content')
    <!-- Breadcrumbs -->
    <div class="bg-white py-4 border-y">
        <div class="container mx-auto px-4">
            <div class="flex text-sm">
                <a href="index.html" class="text-gray-600 hover:text-emerald-600">Home</a>
                <span class="mx-2 text-gray-400">/</span>
                <a href="{{ route('products.index') }}?category={{ $product->category->name }}" class="text-gray-600 hover:text-emerald-600">{{ $product->category->name }}</a>
                <span class="mx-2 text-gray-400">/</span>
                <span class="text-gray-800">{{ $product->name }}</span>
            </div>
        </div>
    </div>

    <!-- Product Detail -->
    <section class="py-12" x-data>
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row -mx-4">
                <!-- Product Images -->
                <div class="md:w-1/3 px-4 mb-8 md:mb-0">
                    <div class="sticky top-6">
                        <div class="mb-6">
                            <img src="{{ $product->image_path }}" alt="Wireless Headphones" class="w-full h-auto border overflow-hidden rounded-lg shadow">
                        </div>

                        @if($product->images->count() > 0)
                            <div class="grid grid-cols-4 gap-4">
                                @foreach($product->images as $image)
                                    <img src="{{ $image->path }}" alt="Thumbnail 1" class="w-full h-24 object-cover rounded cursor-pointer border-2 border-emerald-600">
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Product Info -->
                <div class="md:w-2/3 px-4">
                    <h1 class="text-3xl font-bold mb-2">{{ $product->name }}</h1>
                    <div class="flex items-center mb-4">
                        <div class="flex text-yellow-400 mr-2">
                            @for ($i = 0; $i < 5; $i++)
                                @if (floor($product->average_rating) - $i >= 1)
                                    <i class="fas fa-star"></i>
                                @elseif ($product->average_rating - $i > 0)
                                    <i class="fas fa-star-half-alt"></i>
                                @else
                                    <i class="far fa-star text-gray-300"></i>
                                @endif
                            @endfor
                        </div>
                        <span class="text-gray-600">{{ $product->average_rating }} ({{ $product->reviews->count() }} reviews)</span>
                    </div>

                    <div class="text-2xl font-bold mb-6">${{ $product->price }}</div>

                    <!-- Quantity -->
                    <div class="mb-6">
                        <h3 class="font-medium mb-2">Quantity</h3>
                        <div class="flex">
                            <button class="cursor-pointer bg-gray-200 px-3 py-1 rounded-l" @click="$store.productDetail.decrementQuantity()">-</button>
                            <input type="text" x-model="$store.productDetail.quantity" class="w-16 text-center border-t border-b">
                            <button class="cursor-pointer bg-gray-200 px-3 py-1 rounded-r" @click="$store.productDetail.incrementQuantity()">+</button>
                        </div>
                    </div>

                    <!-- Add to Cart Button -->
                    <div class="flex space-x-4 mb-6">
                        <button @click='$store.cart.addToCart(@json($product), $store.productDetail.quantity)' class="bg-emerald-600 text-white px-8 py-3 rounded-md font-medium hover:bg-emerald-700 transition cursor-pointer">Add to Cart</button>
                        <button class="border border-gray-300 px-3 py-3 rounded-md hover:bg-gray-100 transition">
                            <i class="far fa-heart"></i>
                        </button>
                    </div>

                    <!-- Shipping Info -->
                    <div class="border-t border-gray-200 pt-6">
                        <div class="flex items-center mb-4">
                            <i class="fas fa-truck text-emerald-600 mr-3 text-xl"></i>
                            <div>
                                <h4 class="font-medium">Free Shipping</h4>
                                <p class="text-gray-600 text-sm">Free standard shipping on orders over $50</p>
                            </div>
                        </div>
                        <div class="flex items-center mb-4">
                            <i class="fas fa-undo text-emerald-600 mr-3 text-xl"></i>
                            <div>
                                <h4 class="font-medium">Easy Returns</h4>
                                <p class="text-gray-600 text-sm">30-day return policy</p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-shield-alt text-emerald-600 mr-3 text-xl"></i>
                            <div>
                                <h4 class="font-medium">Secure Checkout</h4>
                                <p class="text-gray-600 text-sm">SSL encrypted payment processing</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <x-tabs :tabs="['description' => 'Description', 'reviews' => 'Reviews (' . $product->reviews()->count() . ')']">
                <div x-show="tab === 'description'">
                    <h3 class="text-xl font-bold mb-4">Product Description</h3>
                    <p class="text-gray-700 mb-4">{{ $product->description }}</p>
                </div>

                <div x-show="tab === 'reviews'">
                    <h3 class="text-xl font-bold mb-4">Customer Reviews</h3>
                    @include('components.product-reviews')
                </div>
            </x-tabs>

            <!-- Related Products -->
            <div class="mt-16">
                <h2 class="text-2xl font-bold mb-8">You May Also Like</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach($relatedProducts as $product)
                        @include('components.product-card')
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
