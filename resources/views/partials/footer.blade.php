
<!-- Footer -->
<footer class="bg-gray-800 text-white py-8">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div>
                <h3 class="text-xl font-bold mb-4">GreenBasket</h3>
                <p class="text-gray-300">Your one-stop shop for all your needs.</p>
            </div>
            <div>
                <h4 class="font-bold mb-4">Shop</h4>
                <ul class="space-y-2">
                    <li><a href={{ route("categories.index") }} class="text-gray-300 hover:text-white">Categories</a></li>
                    <li><a href={{ route("products.index") }} class="text-gray-300 hover:text-white">All Products</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold mb-4">Account</h4>
                <ul class="space-y-2">
                    <li><a href={{ route("login") }} class="text-gray-300 hover:text-white">Login</a></li>
                    <li><a href={{ route("register") }} class="text-gray-300 hover:text-white">Register</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold mb-4">Contact</h4>
                <ul class="space-y-2">
                    <li class="text-gray-300">Email: info@greenbasket.com</li>
                    <li class="text-gray-300">Phone: (123) 456-7890</li>
                    <li class="flex space-x-4 mt-4">
                        <a href="#" class="text-gray-300 hover:text-white"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="text-gray-300 hover:text-white"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-gray-300 hover:text-white"><i class="fab fa-instagram"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="border-t border-gray-700 mt-8 pt-6 text-center text-gray-300">
            <p>&copy; 2025 GreenBasket. All rights reserved.</p>
        </div>
    </div>
</footer>
