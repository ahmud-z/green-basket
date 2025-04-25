<!-- Header -->
<header class="bg-white shadow" x-data>
    <div class="container mx-auto px-4 py-4">
        <div class="flex items-center justify-between">
            <a href="{{ route('home') }}" class="text-2xl font-bold text-emerald-600">GreenBasket</a>

            <div class="hidden md:flex space-x-8">
                <a href="{{ route('home') }}" class="font-medium hover:text-emerald-600">Home</a>
                <a href="{{ route('categories.index') }}" class="font-medium hover:text-emerald-600">Categories</a>
                <a href="{{ route('products.index') }}" class="font-medium hover:text-emerald-600">Products</a>
            </div>

            <div class="flex items-center space-x-4">
                <a href="{{ route('cart.index') }}" class="relative">
                    <i class="fas fa-shopping-cart text-xl"></i>
                    <span x-text="$store.cart.totalItems" class="absolute -top-2 -right-2 bg-emerald-600 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">0</span>
                </a>

                @auth()
                    <a href="{{ route('logout') }}" class="font-medium hover:text-emerald-600">Logout</a>
                @else
                    <a href="{{ route('login') }}" class="font-medium hover:text-emerald-600">Login</a>
                    <a href="{{ route('register') }}" class="font-medium hover:text-emerald-600">Register</a>
                @endauth
            </div>
        </div>
    </div>
</header>
