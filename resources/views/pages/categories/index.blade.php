@extends('layouts.default')

@section('content')
    <!-- Page Header -->
    <section class="bg-emerald-50 py-8">
        <div class="container mx-auto px-4">
            <h1 class="text-3xl font-bold">Shop by Category</h1>
            <p class="text-gray-600 mt-2">Browse our wide range of product categories</p>
        </div>
    </section>

    <!-- Categories Grid -->
    <section class="py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($categories as $category)
                    <!-- Category 1 -->
                    <a href="{{ route('products.index') }}?filters[categories][]={{ $category->name }}" class="group">
                        <div class="bg-white rounded-lg shadow p-6 text-center hover:shadow-md transition">
                            <img src="{{ $category->image_path }}" alt="Electronics"
                                 class="mx-auto mb-4 h-40 w-40 object-cover">
                            <h3 class="text-xl font-medium group-hover:text-emerald-600 cursor-pointer">{{ $category->name }}</h3>
                        </div>
                    </a>
                @endforeach
            </div>

            <div class="py-6">
                {{ $categories->links() }}
            </div>
        </div>
    </section>
@endsection
