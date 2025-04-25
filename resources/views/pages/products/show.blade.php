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
    <section class="py-12" x-data="productDetail">
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
                        <span class="text-gray-600">4.5 ({{ $product->reviews->count() }} reviews)</span>
                    </div>

                    <div class="text-2xl font-bold mb-6">${{ $product->price }}</div>

                    <div class="mb-6">
                        <p class="text-gray-700 mb-4">{{ $product->description }}</p>
                    </div>

                    <!-- Quantity -->
                    <div class="mb-6">
                        <h3 class="font-medium mb-2">Quantity</h3>
                        <div class="flex">
                            <button class="bg-gray-200 px-3 py-1 rounded-l">-</button>
                            <input type="text" value="1" class="w-16 text-center border-t border-b">
                            <button class="bg-gray-200 px-3 py-1 rounded-r">+</button>
                        </div>
                    </div>

                    <!-- Add to Cart Button -->
                    <div class="flex space-x-4 mb-6">
                        <button x-on:click="$dispatch('notify', {  variant: 'info', title: 'Update Available', message: 'A new version of the app is ready for you. Update now to enjoy the latest features!' })" class="bg-emerald-600 text-white px-8 py-3 rounded-md font-medium hover:bg-emerald-700 transition">Add to Cart</button>
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

            <!-- Product Tabs -->
            <div class="mt-16">
                <div class="border-b border-gray-200">
                    <div class="flex -mb-px">
                        <button class="py-4 px-6 border-b-2 border-emerald-600 font-medium text-emerald-600">Description</button>
                        <button class="py-4 px-6 text-gray-600 font-medium">Reviews ({{ $product->reviews()->count() }})</button>
                    </div>
                </div>

                <div class="py-6">
                    <h3 class="text-xl font-bold mb-4">Product Description</h3>
                    <div class="text-gray-700 space-y-4">
                        <p>Experience premium sound quality with our Wireless Headphones. Designed for comfort and performance, these headphones deliver exceptional audio clarity and powerful bass.</p>
                        <p>The active noise cancellation technology blocks out ambient noise, allowing you to focus on your music or work without distractions. With up to 30 hours of battery life, you can enjoy your favorite tunes all day long.</p>
                        <p>The built-in microphone ensures crystal-clear calls, while the Bluetooth 5.0 connectivity provides a stable and seamless connection to your devices. The comfortable over-ear design with soft cushions makes these headphones perfect for extended listening sessions.</p>
                        <p>Whether you're a music enthusiast, a professional working from home, or a frequent traveler, these wireless headphones are the perfect companion for your audio needs.</p>
                    </div>
                </div>
            </div>

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
