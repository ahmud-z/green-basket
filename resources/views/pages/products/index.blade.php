@extends('layouts.default')

@section('content')
<!-- Page Header -->
<section class="bg-emerald-50 py-8">
    <div class="container mx-auto px-4">
      <h1 class="text-3xl font-bold">All Products</h1>
      <p class="text-gray-600 mt-2">Browse our collection of high-quality products</p>
    </div>
  </section>

  <!-- Products Section -->
  <section class="py-12">
    <div class="container mx-auto px-4">
      <div class="flex flex-col md:flex-row">
        <!-- Filters Sidebar -->
        <div class="w-full md:w-1/4 md:pr-8 mb-8 md:mb-0">
          <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-bold mb-4">Filters</h3>

            <!-- Category Filter -->
            <div class="mb-6">
              <h4 class="font-medium mb-2">Category</h4>
              <div class="space-y-2">
                @foreach ($categories as $category)
                    <label class="flex items-center">
                        <input type="checkbox" class="form-checkbox text-emerald-600 rounded">
                        <span class="ml-2">{{ $category->name }}</span>
                    </label>
                @endforeach
              </div>
            </div>

            <!-- Price Range Filter -->
            <div class="mb-6">
              <h4 class="font-medium mb-2">Price Range</h4>
              <div class="space-y-2">
                <label class="flex items-center">
                  <input type="radio" name="price" class="form-radio text-emerald-600">
                  <span class="ml-2">Under $50</span>
                </label>
                <label class="flex items-center">
                  <input type="radio" name="price" class="form-radio text-emerald-600">
                  <span class="ml-2">$50 - $100</span>
                </label>
                <label class="flex items-center">
                  <input type="radio" name="price" class="form-radio text-emerald-600">
                  <span class="ml-2">$100 - $200</span>
                </label>
                <label class="flex items-center">
                  <input type="radio" name="price" class="form-radio text-emerald-600">
                  <span class="ml-2">$200+</span>
                </label>
              </div>
            </div>

            <!-- Rating Filter -->
            <div class="mb-6">
              <h4 class="font-medium mb-2">Rating</h4>
              <div class="space-y-2">
                <label class="flex items-center">
                  <input type="checkbox" class="form-checkbox text-emerald-600 rounded">
                  <span class="ml-2 flex">
                    <i class="fas fa-star text-yellow-400"></i>
                    <i class="fas fa-star text-yellow-400"></i>
                    <i class="fas fa-star text-yellow-400"></i>
                    <i class="fas fa-star text-yellow-400"></i>
                    <i class="fas fa-star text-yellow-400"></i>
                  </span>
                </label>
                <label class="flex items-center">
                  <input type="checkbox" class="form-checkbox text-emerald-600 rounded">
                  <span class="ml-2 flex">
                    <i class="fas fa-star text-yellow-400"></i>
                    <i class="fas fa-star text-yellow-400"></i>
                    <i class="fas fa-star text-yellow-400"></i>
                    <i class="fas fa-star text-yellow-400"></i>
                    <i class="far fa-star text-yellow-400"></i>
                    <span class="ml-1">& up</span>
                  </span>
                </label>
                <label class="flex items-center">
                  <input type="checkbox" class="form-checkbox text-emerald-600 rounded">
                  <span class="ml-2 flex">
                    <i class="fas fa-star text-yellow-400"></i>
                    <i class="fas fa-star text-yellow-400"></i>
                    <i class="fas fa-star text-yellow-400"></i>
                    <i class="far fa-star text-yellow-400"></i>
                    <i class="far fa-star text-yellow-400"></i>
                    <span class="ml-1">& up</span>
                  </span>
                </label>
                <label class="flex items-center">
                  <input type="checkbox" class="form-checkbox text-emerald-600 rounded">
                  <span class="ml-2 flex">
                    <i class="fas fa-star text-yellow-400"></i>
                    <i class="fas fa-star text-yellow-400"></i>
                    <i class="far fa-star text-yellow-400"></i>
                    <i class="far fa-star text-yellow-400"></i>
                    <i class="far fa-star text-yellow-400"></i>
                    <span class="ml-1">& up</span>
                  </span>
                </label>
              </div>
            </div>

            <!-- Apply Filters Button -->
            <button class="w-full bg-emerald-600 text-white py-2 rounded font-medium hover:bg-emerald-700 transition">Apply Filters</button>
          </div>
        </div>

        <!-- Products Grid -->
        <div class="w-full md:w-3/4">
          <!-- Sort Options -->
          <div class="flex justify-between items-center mb-6">
            <p class="text-gray-600">Showing {{ $products->firstItem() }}-{{ $products->lastItem() }} of {{ $products->total() }} products</p>
            <select class="border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-emerald-600">
              <option>Sort by: Featured</option>
              <option>Price: Low to High</option>
              <option>Price: High to Low</option>
              <option>Customer Rating</option>
              <option>Newest</option>
            </select>
          </div>

          <!-- Products -->
          <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($products as $product)
                @include('components.product-card')
            @endforeach
          </div>

          <!-- Pagination -->
          <div class="mt-10">
            {{ $products->links() }}
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
