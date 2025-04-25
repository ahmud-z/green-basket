@extends('layouts.default')

@section('content')
    @include('components.checkout-progress')

    <!-- Confirmation Section -->
    <section class="py-12" x-data x-init="$store.cart.clearCart()">
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
                                <p class="font-medium">#ORD-{{ $order->id }}</p>
                            </div>
                            <div>
                                <p class="text-gray-600">Date</p>
                                <p class="font-medium">{{ $order->created_at->format('Y-M-d') }}</p>
                            </div>
                            <div>
                                <p class="text-gray-600">Total</p>
                                <p class="font-medium">{{ $order->total }}</p>
                            </div>
                            <div>
                                <p class="text-gray-600">Payment Method</p>
                                <p class="font-medium">Credit Card</p>
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
                                @foreach($order->items as $item)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="h-10 w-10 flex-shrink-0">
                                                    <img src="{{ $item->product->image_path }}" alt="Wireless Headphones"
                                                         class="h-10 w-10 rounded">
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">{{ $item->product->name }}</div>
                                                    <div class="text-sm text-gray-500">Black</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{ $item->quantity }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            {{ $item->price * $item->quantity }}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot class="bg-gray-50">
                                <tr>
                                    <td class="px-6 py-3 text-sm font-medium text-gray-900" colspan="2">Subtotal</td>
                                    <td class="px-6 py-3 text-right text-sm font-medium text-gray-900">${{ $order->total }}</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-3 text-sm font-medium text-gray-900" colspan="2">Shipping</td>
                                    <td class="px-6 py-3 text-right text-sm font-medium text-gray-900">Free</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-3 text-base font-bold text-gray-900" colspan="2">Total</td>
                                    <td class="px-6 py-3 text-right text-base font-bold text-gray-900">${{ $order->total }}</td>
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
                                <p class="font-medium">{{ $order->name }}</p>
                                <p>
                                    {!! $order->delivery_address !!}
                                </p>

                                <p class="mt-2">Phone: {{ $order->phone }}</p>
                            </div>
                        </div>

                        <div>
                            <h3 class="text-lg font-medium mb-4">Shipping Method</h3>
                            <div class="border rounded-md p-4">
                                <p>Standard Shipping</p>
                                <p class="text-gray-600">Estimated delivery: April 20-22, 2025</p>
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
                        <a href="{{ route('products.index') }}"
                           class="bg-white border border-gray-300 text-gray-700 px-6 py-3 rounded-md font-medium hover:bg-gray-50 transition text-center">
                            Continue Shopping
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
