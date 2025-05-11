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
<form action="{{ route('products.index') }}" name="productFiltersForm">
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
                                    <input {{ in_array($category->name, request('filters.categories', [])) ? 'checked' : '' }} type="checkbox" value="{{ $category->name }}" name="filters[categories][]" class="form-checkbox text-emerald-600 rounded">
                                    <span class="ml-2">{{ $category->name }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Apply Filters Button -->
                    <button
                        class="w-full bg-emerald-600 text-white py-2 rounded font-medium hover:bg-emerald-700 transition"
                    >
                        Apply Filters
                    </button>
                </div>
        </div>

        <!-- Products Grid -->
        <div class="w-full md:w-3/4">
          <!-- Sort Options -->
          <div class="flex justify-between items-center mb-6">
            <p class="text-gray-600">Showing {{ $products->firstItem() }}-{{ $products->lastItem() }} of {{ $products->total() }} products</p>
            <select name="sort" class="border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-emerald-600" onchange="document.forms.productFiltersForm.submit();">
                <option {{ request('sort') === 'ltoh' ? 'selected' : '' }} value="ltoh">Price: Low to High</option>
                <option {{ request('sort') === 'htol' ? 'selected' : '' }} value="htol">Price: High to Low</option>
                <option {{ request('sort') === 'atoz' ? 'selected' : '' }} value="atoz">Alphabetical: A to Z</option>
                <option {{ request('sort') === 'ztoa' ? 'selected' : '' }} value="ztoa">Alphabetical: Z to A</option>
                <option {{ request('sort') === 'newest' ? 'selected' : '' }} value="newest">Newest</option>
                <option {{ request('sort') === 'oldest' ? 'selected' : '' }} value="oldest">Oldest</option>
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
</form>
@endsection
