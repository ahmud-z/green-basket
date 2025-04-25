<div class="bg-white rounded-lg shadow hover:shadow-md transition border">
    <a href="{{ route('products.show', $product->id) }}">
        <img src="{{ $product->image_path }}" alt="Product 1" class="w-full object-cover rounded-t-lg">
        <div class="p-4">
            <h3 class="font-medium mb-2">{{ $product->name }}</h3>

            <div class="flex items-center text-yellow-400 mb-2">
                @for ($i = 0; $i < 5; $i++)
                    @if (floor($product->average_rating) - $i >= 1)
                        <i class="fas fa-star"></i>
                    @elseif ($product->average_rating - $i > 0)
                        <i class="fas fa-star-half-alt"></i>
                    @else
                        <i class="far fa-star text-gray-300"></i>
                    @endif
                @endfor

                <span class="text-gray-600 ml-2">{{ $product->average_rating }} ({{ $product->reviews->count() }} reviews)</span>
            </div>
            <div class="flex justify-between items-center">
                <span class="font-bold text-lg">৳{{ $product->price }}</span>
                <a class="bg-emerald-600 cursor-pointer text-white px-3 py-1 rounded text-sm hover:bg-emerald-700"
                   href={{ route('cart.add-item', $product->id) }}>Add to Cart</a>
            </div>
        </div>
    </a>
</div>
