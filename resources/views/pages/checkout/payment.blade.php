@extends('layouts.default')

@section('content')
    @include('components.checkout-progress')

    <!-- Payment Section -->
    <section class="py-12" x-data>
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Payment Form -->
                <div class="lg:w-2/3">
                    <div class="bg-white rounded-lg shadow overflow-hidden">
                        <div class="p-6 border-b">
                            <h2 class="text-xl font-bold">Payment Method</h2>
                        </div>

                        <div class="p-6">
                            <form method="post" action="{{ route('checkout.payment') }}">
                                @csrf
                                <!-- Payment Options -->
                                <div class="mb-8">
                                    <div class="flex flex-wrap gap-4 mb-6">
                                        <button type="button"
                                                class="flex items-center justify-center px-4 py-2 border-2 border-emerald-600 rounded-md bg-emerald-50 text-emerald-600 font-medium">
                                            <i class="fas fa-credit-card mr-2"></i>
                                            Credit Card
                                        </button>
                                    </div>

                                    <!-- Credit Card Form -->
                                    <div class="border rounded-md p-6">
                                        <div class="flex mb-6">
                                            <svg class="h-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                                                <g class="nc-icon-wrapper">
                                                    <rect x="2" y="7" width="28" height="18" rx="3" ry="3" fill="#fff"
                                                          stroke-width="0"></rect>
                                                    <path
                                                        d="m27,7H5c-1.657,0-3,1.343-3,3v12c0,1.657,1.343,3,3,3h22c1.657,0,3-1.343,3-3v-12c0-1.657-1.343-3-3-3Zm2,15c0,1.103-.897,2-2,2H5c-1.103,0-2-.897-2-2v-12c0-1.103.897-2,2-2h22c1.103,0,2,.897,2,2v12Z"
                                                        stroke-width="0" opacity=".15"></path>
                                                    <path
                                                        d="m27,8H5c-1.105,0-2,.895-2,2v1c0-1.105.895-2,2-2h22c1.105,0,2,.895,2,2v-1c0-1.105-.895-2-2-2Z"
                                                        fill="#fff" opacity=".2" stroke-width="0"></path>
                                                    <path
                                                        d="m13.392,12.624l-2.838,6.77h-1.851l-1.397-5.403c-.085-.332-.158-.454-.416-.595-.421-.229-1.117-.443-1.728-.576l.041-.196h2.98c.38,0,.721.253.808.69l.738,3.918,1.822-4.608h1.84Z"
                                                        fill="#1434cb" stroke-width="0"></path>
                                                    <path
                                                        d="m20.646,17.183c.008-1.787-2.47-1.886-2.453-2.684.005-.243.237-.501.743-.567.251-.032.943-.058,1.727.303l.307-1.436c-.421-.152-.964-.299-1.638-.299-1.732,0-2.95.92-2.959,2.238-.011.975.87,1.518,1.533,1.843.683.332.912.545.909.841-.005.454-.545.655-1.047.663-.881.014-1.392-.238-1.799-.428l-.318,1.484c.41.188,1.165.351,1.947.359,1.841,0,3.044-.909,3.05-2.317"
                                                        fill="#1434cb" stroke-width="0"></path>
                                                    <path
                                                        d="m25.423,12.624h-1.494c-.337,0-.62.195-.746.496l-2.628,6.274h1.839l.365-1.011h2.247l.212,1.011h1.62l-1.415-6.77Zm-2.16,4.372l.922-2.542.53,2.542h-1.452Z"
                                                        fill="#1434cb" stroke-width="0"></path>
                                                    <path fill="#1434cb" stroke-width="0"
                                                          d="M15.894 12.624L14.446 19.394 12.695 19.394 14.143 12.624 15.894 12.624z"></path>
                                                </g>
                                            </svg>
                                            <svg class="h-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                                                <g class="nc-icon-wrapper">
                                                    <rect x="2" y="7" width="28" height="18" rx="3" ry="3" fill="#fff"
                                                          stroke-width="0"></rect>
                                                    <path
                                                        d="m27,7H5c-1.657,0-3,1.343-3,3v12c0,1.657,1.343,3,3,3h22c1.657,0,3-1.343,3-3v-12c0-1.657-1.343-3-3-3Zm2,15c0,1.103-.897,2-2,2H5c-1.103,0-2-.897-2-2v-12c0-1.103.897-2,2-2h22c1.103,0,2,.897,2,2v12Z"
                                                        stroke-width="0" opacity=".15"></path>
                                                    <path
                                                        d="m27,8H5c-1.105,0-2,.895-2,2v1c0-1.105.895-2,2-2h22c1.105,0,2,.895,2,2v-1c0-1.105-.895-2-2-2Z"
                                                        fill="#fff" opacity=".2" stroke-width="0"></path>
                                                    <path fill="#ff5f00" stroke-width="0"
                                                          d="M13.597 11.677H18.407V20.32H13.597z"></path>
                                                    <path
                                                        d="m13.902,15.999c0-1.68.779-3.283,2.092-4.322-2.382-1.878-5.849-1.466-7.727.932-1.863,2.382-1.451,5.833.947,7.712,2,1.573,4.795,1.573,6.795,0-1.329-1.038-2.107-2.642-2.107-4.322Z"
                                                        fill="#eb001b" stroke-width="0"></path>
                                                    <path
                                                        d="m24.897,15.999c0,3.039-2.459,5.497-5.497,5.497-1.237,0-2.428-.412-3.39-1.176,2.382-1.878,2.795-5.329.916-7.727-.275-.336-.58-.657-.916-.916,2.382-1.878,5.849-1.466,7.712.932.764.962,1.176,2.153,1.176,3.39Z"
                                                        fill="#f79e1b" stroke-width="0"></path>
                                                </g>
                                            </svg>
                                            <svg class="h-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                                                <g class="nc-icon-wrapper">
                                                    <rect x="2" y="7" width="28" height="18" rx="3" ry="3"
                                                          fill="#0f70ce" stroke-width="0"></rect>
                                                    <path
                                                        d="m27.026,9l-.719,1.965-.708-1.965h-3.885v2.582l-1.136-2.582h-3.119l-3.259,7.409h2.637v6.591h8.097l1.316-1.458,1.322,1.458h2.244c.112-.314.184-.647.184-1v-1.041l-1.58-1.698,1.58-1.655v-7.606c0-.353-.072-.686-.184-1h-2.79Z"
                                                        fill="#fff" stroke-width="0"></path>
                                                    <path
                                                        d="m17.679,14.433h2.61l.502,1.148h1.78l-2.531-5.754h-2.039l-2.531,5.754h1.734l.477-1.148Zm1.307-3.135l.775,1.844h-1.535l.761-1.844Z"
                                                        fill="#0f70ce" stroke-width="0"></path>
                                                    <path fill="#0f70ce" stroke-width="0"
                                                          d="M22.542 9.827L25.018 9.827 26.302 13.39 27.604 9.827 30 9.827 30 15.581 28.45 15.581 28.45 11.603 26.977 15.581 25.608 15.581 24.124 11.631 24.124 15.581 22.542 15.581 22.542 9.827z"></path>
                                                    <path fill="#0f70ce" stroke-width="0"
                                                          d="M19.24 20.82L19.24 19.944 22.484 19.944 22.484 18.624 19.24 18.624 19.24 17.748 22.565 17.748 22.565 16.409 17.664 16.409 17.664 22.173 22.565 22.173 22.565 20.82 19.24 20.82z"></path>
                                                    <path fill="#0f70ce" stroke-width="0"
                                                          d="M24.638 16.409L26.271 18.234 27.968 16.409 30 16.409 27.283 19.254 30 22.173 27.939 22.173 26.249 20.309 24.567 22.173 22.537 22.173 25.272 19.275 22.537 16.409 24.638 16.409z"></path>
                                                    <path
                                                        d="m27,7H5c-1.657,0-3,1.343-3,3v12c0,1.657,1.343,3,3,3h22c1.657,0,3-1.343,3-3v-12c0-1.657-1.343-3-3-3Zm2,15c0,1.103-.897,2-2,2H5c-1.103,0-2-.897-2-2v-12c0-1.103.897-2,2-2h22c1.103,0,2,.897,2,2v12Z"
                                                        stroke-width="0" opacity=".15"></path>
                                                    <path
                                                        d="m27,8H5c-1.105,0-2,.895-2,2v1c0-1.105.895-2,2-2h22c1.105,0,2,.895,2,2v-1c0-1.105-.895-2-2-2Z"
                                                        fill="#fff" opacity=".2" stroke-width="0"></path>
                                                </g>
                                            </svg>
                                            <svg class="h-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                                                <g class="nc-icon-wrapper">
                                                    <rect x="2" y="7" width="28" height="18" rx="3" ry="3" fill="#fff"
                                                          stroke-width="0"></rect>
                                                    <path
                                                        d="m27,7h-8c4.971,0,9,4.029,9,9s-4.029,9-9,9h8c1.657,0,3-1.343,3-3v-12c0-1.657-1.343-3-3-3Z"
                                                        fill="#f47922" stroke-width="0"></path>
                                                    <path
                                                        d="m27,7H5c-1.657,0-3,1.343-3,3v12c0,1.657,1.343,3,3,3h22c1.657,0,3-1.343,3-3v-12c0-1.657-1.343-3-3-3Zm2,15c0,1.103-.897,2-2,2H5c-1.103,0-2-.897-2-2v-12c0-1.103.897-2,2-2h22c1.103,0,2,.897,2,2v12Z"
                                                        stroke-width="0" opacity=".15"></path>
                                                    <path
                                                        d="m27,8H5c-1.105,0-2,.895-2,2v1c0-1.105.895-2,2-2h22c1.105,0,2,.895,2,2v-1c0-1.105-.895-2-2-2Z"
                                                        fill="#fff" opacity=".2" stroke-width="0"></path>
                                                    <path
                                                        d="m5.081,14.116h-1.081v3.777h1.076c.572,0,.985-.135,1.348-.436.431-.357.686-.894.686-1.45,0-1.115-.833-1.891-2.027-1.891Zm.86,2.837c-.231.209-.532.3-1.008.3h-.198v-2.497h.198c.476,0,.765.085,1.008.305.255.227.408.578.408.94s-.153.725-.408.952Z"
                                                        fill="#231f20" stroke-width="0"></path>
                                                    <path fill="#231f20" stroke-width="0"
                                                          d="M7.448 14.116H8.185V17.893H7.448z"></path>
                                                    <path
                                                        d="m9.986,15.565c-.442-.164-.572-.271-.572-.475,0-.238.231-.419.549-.419.221,0,.402.091.594.306l.386-.505c-.317-.277-.696-.419-1.11-.419-.668,0-1.178.464-1.178,1.082,0,.52.237.787.929,1.036.288.102.435.17.509.215.147.096.221.232.221.391,0,.306-.243.533-.572.533-.351,0-.634-.175-.804-.504l-.476.458c.339.498.747.719,1.308.719.766,0,1.303-.509,1.303-1.24,0-.6-.248-.872-1.086-1.178Z"
                                                        fill="#231f20" stroke-width="0"></path>
                                                    <path
                                                        d="m11.305,16.007c0,1.11.872,1.971,1.994,1.971.317,0,.589-.062.924-.22v-.867c-.295.295-.555.414-.889.414-.742,0-1.269-.538-1.269-1.303,0-.725.543-1.297,1.234-1.297.351,0,.617.125.924.425v-.867c-.323-.164-.589-.232-.906-.232-1.116,0-2.011.878-2.011,1.976Z"
                                                        fill="#231f20" stroke-width="0"></path>
                                                    <path fill="#231f20" stroke-width="0"
                                                          d="M20.063 16.653L19.056 14.116 18.251 14.116 19.854 17.99 20.25 17.99 21.882 14.116 21.083 14.116 20.063 16.653z"></path>
                                                    <path fill="#231f20" stroke-width="0"
                                                          d="M22.215 17.893L24.304 17.893 24.304 17.253 22.951 17.253 22.951 16.234 24.254 16.234 24.254 15.594 22.951 15.594 22.951 14.756 24.304 14.756 24.304 14.116 22.215 14.116 22.215 17.893z"></path>
                                                    <path
                                                        d="m27.221,15.231c0-.707-.487-1.115-1.337-1.115h-1.092v3.777h.736v-1.517h.096l1.02,1.517h.906l-1.189-1.591c.555-.113.861-.492.861-1.071Zm-1.478.624h-.216v-1.144h.227c.459,0,.708.192.708.56,0,.38-.249.584-.72.584Z"
                                                        fill="#231f20" stroke-width="0"></path>
                                                    <path
                                                        d="m18.461,16c0,1.105-.895,2-2,2s-2-.895-2-2,.895-2,2-2,2,.895,2,2Z"
                                                        fill="#f47922" stroke-width="0"></path>
                                                </g>
                                            </svg>
                                        </div>

                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                            <div class="md:col-span-2">
                                                <label for="card-name" class="block text-gray-700 font-medium mb-2">
                                                    Name on Card
                                                </label>
                                                <input type="text" name="card-name" id="card-name"
                                                       class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-emerald-600"
                                                       placeholder="John Doe" required>
                                            </div>
                                            <div class="md:col-span-2">
                                                <label for="card-number" class="block text-gray-700 font-medium mb-2">
                                                    Card Number
                                                </label>
                                                <div class="relative">
                                                    <input type="text" name="card-number" id="card-number"
                                                           class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-emerald-600"
                                                           x-mask:dynamic="
                                                                $input.startsWith('34') || $input.startsWith('37')
                                                                    ? '9999 999999 99999' : '9999 9999 9999 9999'
                                                                "
                                                           placeholder="1234 5678 9012 3456" required>
                                                    <i class="fas fa-credit-card absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                                </div>
                                            </div>
                                            <div>
                                                <label for="expiry" class="block text-gray-700 font-medium mb-2">
                                                    Expiration Date
                                                </label>
                                                <input
                                                    type="text" name="expiry" id="expiry"
                                                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-emerald-600"
                                                    x-mask="99/99"
                                                    placeholder="MM/YY"
                                                    required
                                                >
                                            </div>
                                            <div>
                                                <label for="cvv"
                                                       class="block text-gray-700 font-medium mb-2">CVV</label>
                                                <div class="relative">
                                                    <input
                                                        type="text"
                                                        id="cvv"
                                                        name="cvv"
                                                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-emerald-600"
                                                        placeholder="123"
                                                        x-mask="999"
                                                        required
                                                    >
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
                                    <a href="{{ route('checkout.shipping') }}"
                                       class="inline-flex items-center text-emerald-600 hover:text-emerald-800">
                                        <i class="fas fa-arrow-left mr-2"></i>
                                        Return to Shipping
                                    </a>
                                    <button
                                        class="bg-emerald-600 text-white px-6 py-3 rounded-md font-medium hover:bg-emerald-700 transition">
                                        Complete Order
                                    </button>
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
                                <template x-for="(item, index) in $store.cart.items">
                                    <div class="flex">
                                        <div class="w-16 h-16 rounded border overflow-hidden">
                                            <img :src="item.image" alt="Wireless Headphones"
                                                 class="w-full h-full object-cover">
                                        </div>
                                        <div class="ml-4 flex-grow">
                                            <h4 class="font-medium" x-text="item.name"></h4>
                                            <p class="text-gray-600 text-sm">Qty: <span x-text="item.quantity"></span>
                                            </p>
                                        </div>
                                        <div class="font-medium"
                                             x-text="$store.cart.formatCurrency(item.price * item.quantity)"></div>
                                    </div>
                                </template>
                            </div>

                            <!-- Price Breakdown -->
                            <div class="space-y-4 border-t pt-4">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Subtotal</span>
                                    <span x-text="$store.cart.formatCurrency($store.cart.subtotal)">$0</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Shipping</span>
                                    <span>Free</span>
                                </div>
                                <div class="border-t pt-4 flex justify-between font-bold text-lg">
                                    <span>Total</span>
                                    <span x-text="$store.cart.formatCurrency($store.cart.total)">$0</span>
                                </div>
                            </div>

                            <!-- Shipping Address Summary -->
                            <div class="mt-6 pt-6 border-t">
                                <h3 class="font-medium mb-2">Shipping Address</h3>
                                <p class="text-gray-600">
                                    {{ session('checkout.shipping')['first_name'] }} {{ session('checkout.shipping')['last_name'] }}<br>
                                    {{ session('checkout.shipping')['address'] }}<br>
                                    {{ session('checkout.shipping')['city'] }}, {{ session('checkout.shipping')['zip'] }}<br>
                                    {{ session('checkout.shipping')['country'] }}
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
