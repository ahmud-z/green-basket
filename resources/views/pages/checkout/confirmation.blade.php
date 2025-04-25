@extends('layouts.default')

@section('content')
    @include('components.checkout-progress')

    <!-- Confirmation Section -->
    <section class="py-12">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto bg-white rounded-lg shadow overflow-hidden">
                <div class="p-6 border-b bg-green-50">
                    <div class="flex items-center justify-center">
                        <div
                            class="h-16 w-16 rounded-full bg-green-100 flex items-center justify-center text-green-600 text-3xl">
                            <i class="fas fa-check"></i>
                        </div>
                    </div>
                    <h2 class="text-2xl font-bold text-center mt-4">Order Confirmed!</h2>
                    <p class="text-center text-gray-600 mt-2">Thank you for your purchase. Your order has been received.</p>
                </div>

                <div class="p-6">
                    <!-- Order Details -->
                    <div class="mb-8">
                        <h3 class="text-lg font-medium mb-4">Order Details</h3>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-sm">
                            <div>
                                <p class="text-gray-600">Order Number</p>
                                <p class="font-medium">#ORD-12345678</p>
                            </div>
                            <div>
                                <p class="text-gray-600">Date</p>
                                <p class="font-medium">April 17, 2023</p>
                            </div>
                            <div>
                                <p class="text-gray-600">Total</p>
                                <p class="font-medium">$431.97</p>
                            </div>
                            <div>
                                <p class="text-gray-600">Payment Method</p>
                                <p class="font-medium">Credit Card (•••• 1234)</p>
                            </div>
                        </div>
                    </div>

                    <!-- Order Items -->
                    <div class="mb-8">
                        <h3 class="text-lg font-medium mb-4">Order Items</h3>
                        <div class="border rounded-md overflow-hidden">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Product
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Quantity
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Price
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="h-10 w-10 flex-shrink-0">
                                                <img src="/placeholder.svg?height=100&width=100" alt="Wireless Headphones"
                                                     class="h-10 w-10 rounded">
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">Wireless Headphones</div>
                                                <div class="text-sm text-gray-500">Black</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">1</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        $129.99
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="h-10 w-10 flex-shrink-0">
                                                <img src="/placeholder.svg?height=100&width=100" alt="Smart Watch"
                                                     class="h-10 w-10 rounded">
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">Smart Watch</div>
                                                <div class="text-sm text-gray-500">Silver</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">1</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        $199.99
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="h-10 w-10 flex-shrink-0">
                                                <img src="/placeholder.svg?height=100&width=100" alt="Bluetooth Speaker"
                                                     class="h-10 w-10 rounded">
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">Bluetooth Speaker</div>
                                                <div class="text-sm text-gray-500">Blue</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">1</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        $69.99
                                    </td>
                                </tr>
                                </tbody>
                                <tfoot class="bg-gray-50">
                                <tr>
                                    <td class="px-6 py-3 text-sm font-medium text-gray-900" colspan="2">Subtotal</td>
                                    <td class="px-6 py-3 text-right text-sm font-medium text-gray-900">$399.97</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-3 text-sm font-medium text-gray-900" colspan="2">Shipping</td>
                                    <td class="px-6 py-3 text-right text-sm font-medium text-gray-900">Free</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-3 text-sm font-medium text-gray-900" colspan="2">Tax</td>
                                    <td class="px-6 py-3 text-right text-sm font-medium text-gray-900">$32.00</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-3 text-base font-bold text-gray-900" colspan="2">Total</td>
                                    <td class="px-6 py-3 text-right text-base font-bold text-gray-900">$431.97</td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                    <!-- Shipping Information -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                        <div>
                            <h3 class="text-lg font-medium mb-4">Shipping Information</h3>
                            <div class="border rounded-md p-4">
                                <p class="font-medium">John Doe</p>
                                <p>123 Main Street</p>
                                <p>Apt 4B</p>
                                <p>New York, NY 10001</p>
                                <p>United States</p>
                                <p class="mt-2">Phone: (123) 456-7890</p>
                            </div>
                        </div>

                        <div>
                            <h3 class="text-lg font-medium mb-4">Shipping Method</h3>
                            <div class="border rounded-md p-4">
                                <p>Standard Shipping</p>
                                <p class="text-gray-600">Estimated delivery: April 20-22, 2023</p>
                            </div>
                        </div>
                    </div>

                    <!-- Next Steps -->
                    <div class="bg-gray-50 p-6 rounded-md mb-8">
                        <h3 class="text-lg font-medium mb-4">What's Next?</h3>
                        <ul class="space-y-2">
                            <li class="flex items-start">
                                <i class="fas fa-envelope text-emerald-600 mt-1 mr-3"></i>
                                <div>
                                    <p class="font-medium">Order Confirmation Email</p>
                                    <p class="text-gray-600">We've sent a confirmation email to your email address with all
                                        the details of your order.</p>
                                </div>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-box text-emerald-600 mt-1 mr-3"></i>
                                <div>
                                    <p class="font-medium">Order Processing</p>
                                    <p class="text-gray-600">We're preparing your order for shipment. You'll receive another
                                        email when your order ships.</p>
                                </div>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-truck text-emerald-600 mt-1 mr-3"></i>
                                <div>
                                    <p class="font-medium">Shipping</p>
                                    <p class="text-gray-600">Your order will be delivered within the estimated delivery
                                        timeframe.</p>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
                        <a href="orders.html"
                           class="bg-emerald-600 text-white px-6 py-3 rounded-md font-medium hover:bg-emerald-700 transition text-center">
                            View Order Status
                        </a>
                        <a href="index.html"
                           class="bg-white border border-gray-300 text-gray-700 px-6 py-3 rounded-md font-medium hover:bg-gray-50 transition text-center">
                            Continue Shopping
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
