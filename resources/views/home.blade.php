@extends('layouts.default')


@section('content')
    <!-- Hero Section -->
    <section class="py-12 md:py-10 bg-[url('https://nest-frontend-v6.vercel.app/assets/imgs/banner/banner-12.png')] bg-no-repeat">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-8 md:mb-0">
                    <h1 class="text-4xl md:text-5xl font-bold mb-4">Shop the Latest Trends</h1>
                    <p class="text-lg mb-6">Discover our curated collection of products at unbeatable prices.</p>
                    <a href="{{ route('products.index') }}" class="bg-emerald-600 text-white px-6 py-3 rounded-md font-medium hover:bg-emerald-700 transition">Shop Now</a>
                </div>
                <div class="md:w-1/2">
                    {{-- <img src="https://chaldn.com/asset/Egg.ChaldalWeb.Fabric/Egg.ChaldalWeb1/1.0.0-Deploy-Release-757/Default/stores/chaldal/components/landingPage2/LandingPage/images/imageBanner.png?q=low&webp=1" alt="Hero Image"> --}}
                    <img class="xl:pl-50" src="https://cdn3d.iconscout.com/3d/premium/thumb/announcement-of-product-discounts-in-e-commerce-3d-illustration-download-png-blend-fbx-gltf-file-formats--online-shopping-shop-marketing-store-pack-illustrations-6241789.png" alt="Hero Image">
                </div>
            </div>
        </div>
    </section>

    @include('components.hero')

    <!-- Featured Categories -->
    <section class="py-12">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-bold mb-8 text-center">Shop by Category</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                @foreach($topCategories as $category)
                    <a href="{{ route('products.index') }}?category={{ $category->name }}" class="group">
                        <div class="bg-white rounded-lg shadow p-4 text-center hover:shadow-md transition">
                            <img src="{{ $category->image_path }}" alt="{{ $category->name }}"
                                 class="mx-auto mb-4 h-32 w-32 object-cover">
                            <h3 class="font-medium group-hover:text-emerald-600">{{ $category->name }}</h3>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Featured Products -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-bold mb-8 text-center">Featured Products</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
                @foreach($organicProducts as $product)
                    @include('components.product-card')
                @endforeach
            </div>
        </div>
    </section>

    <!-- Featured Products -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-bold mb-8 text-center">Top Selling Products</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
                @foreach($topSellingProducts as $product)
                    @include('components.product-card')
                @endforeach
            </div>
        </div>
    </section>

    <!-- Newsletter -->
    <section class="py-12 bg-emerald-50">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-2xl font-bold mb-4">Subscribe to Our Newsletter</h2>
            <p class="mb-6 max-w-md mx-auto">Stay updated with our latest products and exclusive offers.</p>
            <form class="max-w-md mx-auto flex">
                <input type="email" placeholder="Your email address"
                       class="flex-grow px-4 py-2 rounded-l-md border-2 border-emerald-600 focus:outline-none">
                <button type="submit"
                        class="bg-emerald-600 text-white px-6 py-2 rounded-r-md font-medium hover:bg-emerald-700 transition">
                    Subscribe
                </button>
            </form>
        </div>
    </section>
@endsection
