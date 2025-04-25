@extends('layouts.default')

@section('content')
 <!-- Page Header -->
 <section class="bg-emerald-50 py-8">
    <div class="container mx-auto px-4">
      <h1 class="text-3xl font-bold">Your Shopping Cart</h1>
      <p class="text-gray-600 mt-2">Review your items and proceed to checkout</p>
    </div>
  </section>

  <!-- Cart Section -->
  <section class="py-12">
    <div class="container mx-auto px-4">
      <div class="flex flex-col lg:flex-row gap-8">
        <!-- Cart Items -->
        <div class="lg:w-2/3">
          <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="p-6 border-b">
              <h2 class="text-xl font-bold">Cart Items ({{ count(session()->get('cart', [])) }})</h2>
            </div>
            @foreach ($cartProducts as $product)
                <!-- Cart Item 1 -->
                <div class="p-6 border-b flex flex-col sm:flex-row items-center">
                <div class="sm:w-24 mb-4 sm:mb-0">
                  <img src="{{ $product->image_path }}" alt="{{ $product->name }}" class="w-full h-auto rounded">
                </div>
                <div class="sm:ml-6 flex-grow">
                  <h3 class="font-medium">{{ $product->name }}</h3>
                  <div class="flex items-center mt-2">
                    <button class="text-gray-500 hover:text-emerald-600">
                      <i class="far fa-heart"></i>
                      <span class="ml-1 text-sm">Save for later</span>
                    </button>
                    <span class="mx-3 text-gray-300">|</span>
                    <button class="text-gray-500 hover:text-red-600">
                      <i class="far fa-trash-alt"></i>
                      <span class="ml-1 text-sm">Remove</span>
                    </button>
                  </div>
                </div>
                <div class="flex items-center mt-4 sm:mt-0">
                  <div class="flex mr-6">
                    <button class="bg-gray-200 px-3 py-1 rounded-l">-</button>
                    <input type="text" value="1" class="w-12 text-center border-t border-b">
                    <button class="bg-gray-200 px-3 py-1 rounded-r">+</button>
                  </div>
                  <div class="font-bold text-lg">${{ $product->price }}</div>
                </div>
              </div>
            @endforeach
          </div>

          <!-- Continue Shopping -->
          <div class="mt-6">
            <a href="{{ route('products.index') }}" class="inline-flex items-center text-emerald-600 hover:text-emerald-800">
              <i class="fas fa-arrow-left mr-2"></i>
              Continue Shopping
            </a>
          </div>
        </div>

        <!-- Order Summary -->
        <div class="lg:w-1/3">
          <div class="bg-white rounded-lg shadow overflow-hidden sticky top-6">
            <div class="p-6 border-b">
              <h2 class="text-xl font-bold">Order Summary</h2>
            </div>
            <div class="p-6">
              <div class="space-y-4">
                <div class="flex justify-between">
                  <span class="text-gray-600">Subtotal (3 items)</span>
                  <span>$399.97</span>
                </div>
                <div class="flex justify-between">
                  <span class="text-gray-600">Shipping</span>
                  <span>Free</span>
                </div>
                <div class="border-t pt-4 flex justify-between font-bold text-lg">
                  <span>Total</span>
                  <span>$431.97</span>
                </div>
              </div>

              <!-- Promo Code -->
              <div class="mt-6">
                <label for="promo" class="block text-sm font-medium text-gray-700 mb-2">Promo Code</label>
                <div class="flex">
                  <input type="text" id="promo" class="flex-grow px-4 py-2 rounded-l-md border focus:outline-none focus:ring-2 focus:ring-emerald-600" placeholder="Enter code">
                  <button class="bg-gray-200 text-gray-800 px-4 py-2 rounded-r-md font-medium hover:bg-gray-300 transition">Apply</button>
                </div>
              </div>

              <!-- Checkout Button -->
              <div class="mt-6">
                <a href="{{ route('checkout.shipping') }}" class="block bg-emerald-600 text-white text-center px-4 py-3 rounded-md font-medium hover:bg-emerald-700 transition">Proceed to Checkout</a>
              </div>

              <!-- Payment Methods -->
              <div class="mt-6 flex justify-center space-x-4">
                <i class="fab fa-cc-visa text-2xl text-gray-600"></i>
                <i class="fab fa-cc-mastercard text-2xl text-gray-600"></i>
                <i class="fab fa-cc-amex text-2xl text-gray-600"></i>
                <i class="fab fa-cc-paypal text-2xl text-gray-600"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  @endsection
