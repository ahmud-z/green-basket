@extends('layouts.default')

@section('content')
    @include('components.checkout-progress')

    <!-- Checkout Section -->
    <section class="py-12">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Checkout Form -->
                <div class="lg:w-2/3">
                    <div class="bg-white rounded-lg shadow overflow-hidden">
                        <div class="p-6 border-b">
                            <h2 class="text-xl font-bold">Shipping Information</h2>
                        </div>

                        <div class="p-6">
                            <form>
                                <!-- Contact Information -->
                                <div class="mb-8">
                                    <h3 class="text-lg font-medium mb-4">Contact Information</h3>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <label for="email" class="block text-gray-700 font-medium mb-2">Email
                                                Address</label>
                                            <input type="email" id="email"
                                                   class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-emerald-600"
                                                   placeholder="your@email.com" required>
                                        </div>
                                        <div>
                                            <label for="phone" class="block text-gray-700 font-medium mb-2">Phone
                                                Number</label>
                                            <input type="tel" id="phone"
                                                   class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-emerald-600"
                                                   placeholder="(123) 456-7890" required>
                                        </div>
                                    </div>
                                </div>

                                <!-- Shipping Address -->
                                <div class="mb-8">
                                    <h3 class="text-lg font-medium mb-4">Shipping Address</h3>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <label for="first-name" class="block text-gray-700 font-medium mb-2">First
                                                Name</label>
                                            <input type="text" id="first-name"
                                                   class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-emerald-600"
                                                   required>
                                        </div>
                                        <div>
                                            <label for="last-name" class="block text-gray-700 font-medium mb-2">Last
                                                Name</label>
                                            <input type="text" id="last-name"
                                                   class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-emerald-600"
                                                   required>
                                        </div>
                                        <div class="md:col-span-2">
                                            <label for="address"
                                                   class="block text-gray-700 font-medium mb-2">Address</label>
                                            <input type="text" id="address"
                                                   class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-emerald-600"
                                                   placeholder="Street address, apartment, suite, etc." required>
                                        </div>
                                        <div class="md:col-span-2">
                                            <label for="address2" class="block text-gray-700 font-medium mb-2">Address
                                                Line
                                                2 (Optional)</label>
                                            <input type="text" id="address2"
                                                   class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-emerald-600"
                                                   placeholder="Apartment, suite, unit, building, floor, etc.">
                                        </div>
                                        <div>
                                            <label for="city" class="block text-gray-700 font-medium mb-2">City</label>
                                            <input type="text" id="city"
                                                   class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-emerald-600"
                                                   required>
                                        </div>
                                        <div>
                                            <label for="state" class="block text-gray-700 font-medium mb-2">State /
                                                Province</label>
                                            <select id="state"
                                                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-emerald-600"
                                                    required>
                                                <option value="">Select State</option>
                                                <option value="AL">Alabama</option>
                                                <option value="AK">Alaska</option>
                                                <option value="AZ">Arizona</option>
                                                <option value="CA">California</option>
                                                <option value="CO">Colorado</option>
                                                <option value="CT">Connecticut</option>
                                                <!-- More states would be listed here -->
                                                <option value="WY">Wyoming</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label for="zip" class="block text-gray-700 font-medium mb-2">ZIP / Postal
                                                Code</label>
                                            <input type="text" id="zip"
                                                   class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-emerald-600"
                                                   required>
                                        </div>
                                        <div>
                                            <label for="country"
                                                   class="block text-gray-700 font-medium mb-2">Country</label>
                                            <select id="country"
                                                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-emerald-600"
                                                    required>
                                                <option value="US">United States</option>
                                                <option value="CA">Canada</option>
                                                <option value="UK">United Kingdom</option>
                                                <option value="AU">Australia</option>
                                                <!-- More countries would be listed here -->
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- Shipping Method -->
                                <div class="mb-8">
                                    <h3 class="text-lg font-medium mb-4">Shipping Method</h3>
                                    <div class="space-y-4">
                                        <label
                                            class="flex items-center p-4 border rounded-md cursor-pointer hover:bg-gray-50">
                                            <input type="radio" name="shipping" value="standard"
                                                   class="form-radio text-emerald-600" checked>
                                            <div class="ml-4 flex-grow">
                                                <div class="font-medium">Standard Shipping</div>
                                                <div class="text-gray-600 text-sm">Delivery in 3-5 business days</div>
                                            </div>
                                            <div class="font-medium">Free</div>
                                        </label>
                                        <label
                                            class="flex items-center p-4 border rounded-md cursor-pointer hover:bg-gray-50">
                                            <input type="radio" name="shipping" value="express"
                                                   class="form-radio text-emerald-600">
                                            <div class="ml-4 flex-grow">
                                                <div class="font-medium">Express Shipping</div>
                                                <div class="text-gray-600 text-sm">Delivery in 1-2 business days</div>
                                            </div>
                                            <div class="font-medium">$12.99</div>
                                        </label>
                                        <label
                                            class="flex items-center p-4 border rounded-md cursor-pointer hover:bg-gray-50">
                                            <input type="radio" name="shipping" value="overnight"
                                                   class="form-radio text-emerald-600">
                                            <div class="ml-4 flex-grow">
                                                <div class="font-medium">Overnight Shipping</div>
                                                <div class="text-gray-600 text-sm">Next business day delivery</div>
                                            </div>
                                            <div class="font-medium">$24.99</div>
                                        </label>
                                    </div>
                                </div>

                                <!-- Special Instructions -->
                                <div class="mb-8">
                                    <label for="instructions" class="block text-gray-700 font-medium mb-2">Special
                                        Instructions (Optional)</label>
                                    <textarea id="instructions" rows="3"
                                              class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-emerald-600"
                                              placeholder="Add any special delivery instructions or notes"></textarea>
                                </div>

                                <!-- Save Information -->
                                <div class="mb-8">
                                    <label class="flex items-center">
                                        <input type="checkbox" class="form-checkbox text-emerald-600 rounded">
                                        <span class="ml-2">Save this information for next time</span>
                                    </label>
                                </div>

                                <!-- Navigation Buttons -->
                                <div class="flex justify-between">
                                    <a href="cart.html"
                                       class="inline-flex items-center text-emerald-600 hover:text-emerald-800">
                                        <i class="fas fa-arrow-left mr-2"></i>
                                        Return to Cart
                                    </a>
                                    <a href="checkout-payment.html"
                                       class="bg-emerald-600 text-white px-6 py-3 rounded-md font-medium hover:bg-emerald-700 transition">
                                        Continue to Payment
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Order Summary -->
                <div class="lg:w-1/3">
                    <div class="bg-white rounded-lg shadow overflow-hidden sticky top-6">
                        <div class="p-6 border-b">
                            <h2 class="text-xl font-bold">Order Summary</h2>
                        </div>
                        <div class="p-6">
                            <!-- Order Items -->
                            <div class="space-y-4 mb-6">
                                <div class="flex">
                                    <div class="w-16 h-16 rounded border overflow-hidden">
                                        <img src="/placeholder.svg?height=100&width=100" alt="Wireless Headphones"
                                             class="w-full h-full object-cover">
                                    </div>
                                    <div class="ml-4 flex-grow">
                                        <h4 class="font-medium">Wireless Headphones</h4>
                                        <p class="text-gray-600 text-sm">Qty: 1</p>
                                    </div>
                                    <div class="font-medium">$129.99</div>
                                </div>
                                <div class="flex">
                                    <div class="w-16 h-16 rounded border overflow-hidden">
                                        <img src="/placeholder.svg?height=100&width=100" alt="Smart Watch"
                                             class="w-full h-full object-cover">
                                    </div>
                                    <div class="ml-4 flex-grow">
                                        <h4 class="font-medium">Smart Watch</h4>
                                        <p class="text-gray-600 text-sm">Qty: 1</p>
                                    </div>
                                    <div class="font-medium">$199.99</div>
                                </div>
                                <div class="flex">
                                    <div class="w-16 h-16 rounded border overflow-hidden">
                                        <img src="/placeholder.svg?height=100&width=100" alt="Bluetooth Speaker"
                                             class="w-full h-full object-cover">
                                    </div>
                                    <div class="ml-4 flex-grow">
                                        <h4 class="font-medium">Bluetooth Speaker</h4>
                                        <p class="text-gray-600 text-sm">Qty: 1</p>
                                    </div>
                                    <div class="font-medium">$69.99</div>
                                </div>
                            </div>

                            <!-- Price Breakdown -->
                            <div class="space-y-4 border-t pt-4">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Subtotal</span>
                                    <span>$399.97</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Shipping</span>
                                    <span>Free</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Tax</span>
                                    <span>$32.00</span>
                                </div>
                                <div class="border-t pt-4 flex justify-between font-bold text-lg">
                                    <span>Total</span>
                                    <span>$431.97</span>
                                </div>
                            </div>

                            <!-- Promo Code -->
                            <div class="mt-6">
                                <label for="promo-checkout" class="block text-sm font-medium text-gray-700 mb-2">Promo
                                    Code</label>
                                <div class="flex">
                                    <input type="text" id="promo-checkout"
                                           class="flex-grow px-4 py-2 rounded-l-md border focus:outline-none focus:ring-2 focus:ring-emerald-600"
                                           placeholder="Enter code">
                                    <button
                                        class="bg-gray-200 text-gray-800 px-4 py-2 rounded-r-md font-medium hover:bg-gray-300 transition">
                                        Apply
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
