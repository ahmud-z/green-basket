<!-- Checkout Progress -->
<div class="bg-white border-b">
    <div class="container mx-auto px-4 py-4">
        <div class="flex justify-between items-center">
            <div class="hidden md:flex items-center w-full relative">
                <div class="w-1/3 text-center">
                    <div class="relative">
                        <div
                            class="h-12 w-12 rounded-full {{ Str::endsWith(url()->current(), 'shipping') ? 'bg-emerald-600 text-white' : 'bg-gray-200 text-gray-600' }} flex items-center justify-center mx-auto">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <p class="mt-2 font-medium {{ Str::endsWith(url()->current(), 'shipping') ? 'text-emerald-600' : 'text-gray-600' }}">Shipping</p>
                    </div>
                </div>
                <div class="w-1/3 text-center">
                    <div class="relative">
                        <div
                            class="h-12 w-12 rounded-full {{ Str::endsWith(url()->current(), 'payment') ? 'bg-emerald-600 text-white' : 'bg-gray-200 text-gray-600' }} flex items-center justify-center mx-auto">
                            <i class="fas fa-credit-card"></i>
                        </div>
                        <p class="mt-2 font-medium {{ Str::endsWith(url()->current(), 'payment') ? 'text-emerald-600' : 'text-gray-600' }}">Payment</p>
                    </div>
                </div>
                <div class="w-1/3 text-center">
                    <div class="relative">
                        <div
                            class="h-12 w-12 rounded-full {{ Str::contains(url()->current(), 'confirmation') ? 'bg-emerald-600 text-white' : 'bg-gray-200 text-gray-600' }} flex items-center justify-center mx-auto">
                            <i class="fas fa-check"></i>
                        </div>
                        <p class="mt-2 font-medium {{ Str::contains(url()->current(), 'confirmation') ? 'text-emerald-600' : 'text-gray-600' }}">Confirmation</p>
                    </div>
                </div>
            </div>

            <!-- Mobile Progress -->
            <div class="md:hidden w-full">
                <div class="flex justify-between items-center">
                    <span class="font-medium text-emerald-600">Step 1 of 3: Shipping</span>
                    <div class="w-1/2 h-2 bg-gray-200 rounded-full">
                        <div class="h-2 bg-emerald-600 rounded-full w-1/3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
