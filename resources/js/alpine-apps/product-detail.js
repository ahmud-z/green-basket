export default () => ({
    product: {
        id: 1,
        name: 'Wireless Noise-Cancelling Headphones',
        price: 129.99,
        originalPrice: 159.99,
        description: 'Experience premium sound quality with these wireless noise-cancelling headphones. Perfect for music lovers and professionals alike.',
        rating: 4.5,
        reviewCount: 128,
        images: [
            '/placeholder.svg?height=500&width=500',
            '/placeholder.svg?height=500&width=500&text=Image+2',
            '/placeholder.svg?height=500&width=500&text=Image+3',
            '/placeholder.svg?height=500&width=500&text=Image+4'
        ],
        colors: [
            {name: 'Black', hex: '#000000'},
            {name: 'Silver', hex: '#C0C0C0'},
            {name: 'Blue', hex: '#0000FF'}
        ],
        details: [
            'Bluetooth 5.0 connectivity',
            'Active noise cancellation',
            'Up to 30 hours battery life',
            'Built-in microphone for calls',
            'Comfortable over-ear design',
            'Foldable design for easy storage'
        ]
    },
    relatedProducts: [
        {
            name: 'Bluetooth Speaker',
            price: 69.99,
            rating: 4,
            reviewCount: 86,
            image: '/placeholder.svg?height=300&width=300&text=Speaker'
        },
        {
            name: 'Smart Watch',
            price: 199.99,
            rating: 5,
            reviewCount: 42,
            image: '/placeholder.svg?height=300&width=300&text=Watch'
        },
        {
            name: 'Wireless Earbuds',
            price: 89.99,
            rating: 4,
            reviewCount: 114,
            image: '/placeholder.svg?height=300&width=300&text=Earbuds'
        },
        {
            name: 'Tablet Stand',
            price: 24.99,
            rating: 3,
            reviewCount: 28,
            image: '/placeholder.svg?height=300&width=300&text=Stand'
        }
    ],
    selectedImage: 0,
    selectedColor: 0,
    quantity: 1,
    showToast: false,
    cartCount: 0,

    init() {
        // Load cart count from localStorage
        const savedCart = localStorage.getItem('cart');
        if (savedCart) {
            const cartItems = JSON.parse(savedCart);
            this.cartCount = cartItems.reduce((total, item) => total + item.quantity, 0);
        }
    },

    formatCurrency(value) {
        return '$' + value.toFixed(2);
    },

    incrementQuantity() {
        if (this.quantity < 10) {
            this.quantity++;
        }
    },

    decrementQuantity() {
        if (this.quantity > 1) {
            this.quantity--;
        }
    },

    validateQuantity() {
        let value = parseInt(this.quantity);
        if (isNaN(value) || value < 1) {
            this.quantity = 1;
        } else if (value > 10) {
            this.quantity = 10;
        }
    },

    addToCart() {
        // Get current cart or initialize empty array
        let cart = [];
        const savedCart = localStorage.getItem('cart');
        if (savedCart) {
            cart = JSON.parse(savedCart);
        }

        // Check if product already in cart
        const existingItemIndex = cart.findIndex(item =>
            item.id === this.product.id &&
            item.color === this.product.colors[this.selectedColor].name
        );

        if (existingItemIndex >= 0) {
            // Update quantity if product already in cart
            cart[existingItemIndex].quantity += this.quantity;
            // Cap at 10 items
            if (cart[existingItemIndex].quantity > 10) {
                cart[existingItemIndex].quantity = 10;
            }
        } else {
            // Add new item to cart
            cart.push({
                id: this.product.id,
                name: this.product.name,
                price: this.product.price,
                color: this.product.colors[this.selectedColor].name,
                quantity: this.quantity,
                image: this.product.images[0]
            });
        }

        // Save cart to localStorage
        localStorage.setItem('cart', JSON.stringify(cart));

        // Update cart count
        this.cartCount = cart.reduce((total, item) => total + item.quantity, 0);

        // Show toast notification
        this.showToast = true;
        setTimeout(() => {
            this.showToast = false;
        }, 3000);
    }
})
