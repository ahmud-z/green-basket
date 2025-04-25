@extends('layouts.default')

@section('content')
    @include('components.checkout-progress')

    <!-- Payment Section -->
    <section class="py-12">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Payment Form -->
                <div class="lg:w-2/3">
                    <div class="bg-white rounded-lg shadow overflow-hidden">
                        <div class="p-6 border-b">
                            <h2 class="text-xl font-bold">Payment Method</h2>
                        </div>

                        <div class="p-6">
                            <form>
                                <!-- Payment Options -->
                                <div class="mb-8">
                                    <div class="flex flex-wrap gap-4 mb-6">
                                        <button type="button"
                                                class="flex items-center justify-center px-4 py-2 border-2 border-emerald-600 rounded-md bg-emerald-50 text-emerald-600 font-medium">
                                            <i class="fas fa-credit-card mr-2"></i>
                                            Credit Card
                                        </button>
                                        <button type="button"
                                                class="flex items-center justify-center px-4 py-2 border-2 border-gray-300 rounded-md bg-white text-gray-700 font-medium hover:bg-gray-50">
                                            <i class="fab fa-paypal mr-2"></i>
                                            PayPal
                                        </button>
                                        <button type="button"
                                                class="flex items-center justify-center px-4 py-2 border-2 border-gray-300 rounded-md bg-white text-gray-700 font-medium hover:bg-gray-50">
                                            <i class="fab fa-apple-pay mr-2"></i>
                                            Apple Pay
                                        </button>
                                        <button type="button"
                                                class="flex items-center justify-center px-4 py-2 border-2 border-gray-300 rounded-md bg-white text-gray-700 font-medium hover:bg-gray-50">
                                            <i class="fab fa-google-pay mr-2"></i>
                                            Google Pay
                                        </button>
                                    </div>

                                    <!-- Credit Card Form -->
                                    <div class="border rounded-md p-6">
                                        <div class="flex mb-6">
                                            <img src="/placeholder.svg?height=30&width=40" alt="Visa" class="h-8 mr-2">
                                            <img src="/placeholder.svg?height=30&width=40" alt="Mastercard"
                                                 class="h-8 mr-2">
                                            <img src="/placeholder.svg?height=30&width=40" alt="Amex" class="h-8 mr-2">
                                            <img src="/placeholder.svg?height=30&width=40" alt="Discover" class="h-8">
                                        </div>

                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                            <div class="md:col-span-2">
                                                <label for="card-name" class="block text-gray-700 font-medium mb-2">Name
                                                    on
                                                    Card</label>
                                                <input type="text" id="card-name"
                                                       class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-emerald-600"
                                                       placeholder="John Doe" required>
                                            </div>
                                            <div class="md:col-span-2">
                                                <label for="card-number" class="block text-gray-700 font-medium mb-2">Card
                                                    Number</label>
                                                <div class="relative">
                                                    <input type="text" id="card-number"
                                                           class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-emerald-600"
                                                           placeholder="1234 5678 9012 3456" required>
                                                    <i class="fas fa-credit-card absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                                </div>
                                            </div>
                                            <div>
                                                <label for="expiry" class="block text-gray-700 font-medium mb-2">Expiration
                                                    Date</label>
                                                <input type="text" id="expiry"
                                                       class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-emerald-600"
                                                       placeholder="MM/YY" required>
                                            </div>
                                            <div>
                                                <label for="cvv"
                                                       class="block text-gray-700 font-medium mb-2">CVV</label>
                                                <div class="relative">
                                                    <input type="text" id="cvv"
                                                           class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-emerald-600"
                                                           placeholder="123" required>
                                                    <i class="fas fa-question-circle absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 cursor-help"
                                                       title="3-digit security code on the back of your card"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Billing Address -->
                                <div class="mb-8">
                                    <h3 class="text-lg font-medium mb-4">Billing Address</h3>

                                    <div class="mb-4">
                                        <label class="flex items-center">
                                            <input type="checkbox" class="form-checkbox text-emerald-600 rounded"
                                                   checked>
                                            <span class="ml-2">Same as shipping address</span>
                                        </label>
                                    </div>

                                    <!-- Billing address form would appear here if checkbox is unchecked -->
                                    <div class="hidden">
                                        <!-- This would contain the same address fields as the shipping form -->
                                    </div>
                                </div>

                                <!-- Save Payment Info -->
                                <div class="mb-8">
                                    <label class="flex items-center">
                                        <input type="checkbox" class="form-checkbox text-emerald-600 rounded">
                                        <span class="ml-2">Save my payment information for future purchases</span>
                                    </label>
                                </div>

                                <!-- Navigation Buttons -->
                                <div class="flex justify-between">
                                    <a href="checkout.html"
                                       class="inline-flex items-center text-emerald-600 hover:text-emerald-800">
                                        <i class="fas fa-arrow-left mr-2"></i>
                                        Return to Shipping
                                    </a>
                                    <a href="checkout-confirmation.html"
                                       class="bg-emerald-600 text-white px-6 py-3 rounded-md font-medium hover:bg-emerald-700 transition">
                                        Complete Order
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

                            <!-- Shipping Address Summary -->
                            <div class="mt-6 pt-6 border-t">
                                <h3 class="font-medium mb-2">Shipping Address</h3>
                                <p class="text-gray-600">
                                    John Doe<br>
                                    123 Main Street<br>
                                    Apt 4B<br>
                                    New York, NY 10001<br>
                                    United States
                                </p>
                            </div>

                            <!-- Shipping Method Summary -->
                            <div class="mt-4">
                                <h3 class="font-medium mb-2">Shipping Method</h3>
                                <p class="text-gray-600">Standard Shipping (3-5 business days)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
