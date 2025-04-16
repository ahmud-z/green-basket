<div class="bg-white rounded-lg shadow hover:shadow-md transition border">
    <a href="{{ route('product-details', $product->id) }}">
        <img src="{{ $product->image_path }}" alt="Product 1" class="w-full object-cover rounded-t-lg">
        <div class="p-4">
            <h3 class="font-medium mb-2">{{ $product->name }}</h3>
            <p class="text-gray-600 text-sm mb-2">{{ $product->description }}</p>
            <div class="flex justify-between items-center">
                <span class="font-bold text-lg">৳{{ $product->price }}</span>
                <button class="bg-emerald-600 text-white px-3 py-1 rounded text-sm hover:bg-emerald-700">Add to Cart</button>
            </div>
        </div>
    </a>
</div>
