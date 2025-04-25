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
    <section class="py-12" x-data>
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Cart Items -->
                <div class="lg:w-2/3">
                    <div class="bg-white rounded-lg shadow overflow-hidden">
                        <div class="p-6 border-b">
                            <h2 class="text-xl font-bold">Cart Items (<span x-text="$store.cart.totalItems"></span>)</h2>
                        </div>
                        <!-- Cart Item 1 -->
                        <template  x-for="(item, index) in $store.cart.items">
                            <div class="p-6 border-b flex flex-col sm:flex-row items-center">
                                <div class="sm:w-24 mb-4 sm:mb-0">
                                    <img :src="item.image"
                                         class="w-full h-auto rounded border">
                                </div>
                                <div class="sm:ml-6 flex-grow">
                                    <h3 class="font-medium" x-text="item.name"></h3>
                                    <div class="flex items-center mt-2">
                                        <button @click="$store.cart.removeItem(index)" class="text-gray-500 hover:text-red-600 cursor-pointer">
                                            <i class="far fa-trash-alt"></i>
                                            <span class="ml-1 text-sm">Remove</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="flex justify-between items-center gap-4 mt-4 sm:mt-0">
                                    <div class="font-bold text-lg" x-text="$store.cart.formatCurrency(item.price * item.quantity)"></div>

                                    <div class="flex">
                                        <button @click="$store.cart.decrementQuantity(index)" class="bg-gray-200 px-3 rounded-l cursor-pointer">-</button>
                                        <input type="text" x-model="item.quantity" class="w-12 text-center border-t border-b">
                                        <button @click="$store.cart.incrementQuantity(index)" class="bg-gray-200 px-3 rounded-r cursor-pointer">+</button>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>

                    <!-- Continue Shopping -->
                    <div class="mt-6">
                        <a href="{{ route('products.index') }}"
                           class="inline-flex items-center text-emerald-600 hover:text-emerald-800">
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
                                    <span class="text-gray-600">Subtotal (<span x-text="$store.cart.totalItems"></span> items)</span>
                                    <span>$<span x-text="$store.cart.formatCurrency($store.cart.subtotal)"></span></span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Shipping</span>
                                    <span>Free</span>
                                </div>
                                <div class="border-t pt-4 flex justify-between font-bold text-lg">
                                    <span>Total</span>
                                    <span x-text="$store.cart.formatCurrency($store.cart.total)"></span>
                                </div>
                            </div>

                            <!-- Checkout Button -->
                            <div class="mt-6">
                                <a href="{{ route('checkout.shipping') }}"
                                   class="block bg-emerald-600 text-white text-center px-4 py-3 rounded-md font-medium hover:bg-emerald-700 transition"
                                >
                                    Proceed to Checkout
                                </a>
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
