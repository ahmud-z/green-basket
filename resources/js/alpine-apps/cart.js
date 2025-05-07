import {dispatch} from "alpinejs/src/utils/dispatch.js";

export default {
    init() {
        // Load cart from localStorage
        const savedCart = localStorage.getItem('cart');

        if (savedCart) {
            this.items = JSON.parse(savedCart);
        }
    },

    items: [],
    promoCode: '',
    promoDiscount: 0,
    promoMessage: { text: '', type: '' },
    taxRate: 0.0,
    quantity: 1,

    get totalItems() {
        return this.items.reduce((total, item) => total + item.quantity, 0);
    },

    get subtotal() {
        return this.items.reduce((total, item) => total + (item.price * item.quantity), 0);
    },

    get tax() {
        return this.subtotal * this.taxRate;
    },

    get total() {
        return this.subtotal + this.tax - this.promoDiscount;
    },

    formatCurrency(value) {
        return '৳' + value.toLocaleString();
    },


    addToCart(product, quantity) {
        console.log({product, quantity})
        // Get current cart or initialize empty array
        let cart = [];
        const savedCart = localStorage.getItem('cart');

        if (savedCart) {
            cart = JSON.parse(savedCart);
        }

        // Check if product already in cart
        const existingItemIndex = cart.findIndex(item =>
            item.id === product.id
        );

        if (existingItemIndex >= 0) {
            // Update quantity if product already in cart
            cart[existingItemIndex].quantity += quantity;
            // Cap at 10 items
            if (cart[existingItemIndex].quantity > 10) {
                cart[existingItemIndex].quantity = 10;
            }
        } else {
            // Add new item to cart
            cart.push({
                id: product.id,
                name: product.name,
                price: product.price,
                quantity: quantity,
                image_path: product.image_path
            });
        }

        // Save cart to localStorage
        localStorage.setItem('cart', JSON.stringify(cart));

        const event = new CustomEvent('notify', {
            detail: {
                title: `${quantity} ${product.name} added to your cart.`
            }
        })

        window.dispatchEvent(event)
    },

    incrementQuantity(index) {
        if (this.items[index].quantity < 10) {
            this.items[index].quantity++;
            this.saveCart();
        }
    },

    decrementQuantity(index) {
        if (this.items[index].quantity > 1) {
            this.items[index].quantity--;
            this.saveCart();
        }
    },

    updateQuantity(index, event) {
        dispatch('notify', {  variant: 'info', title: 'Update Available', message: 'A new version of the app is ready for you. Update now to enjoy the latest features!' })

        let value = parseInt(event.target.value);
        if (isNaN(value) || value < 1) {
            value = 1;
        } else if (value > 10) {
            value = 10;
        }
        this.items[index].quantity = value;
        this.saveCart();
    },

    removeItem(index) {
        this.items.splice(index, 1);
        this.saveCart();
    },

    applyPromo() {
        if (!this.promoCode) {
            this.promoMessage = { text: 'Please enter a promo code', type: 'error' };
            return;
        }

        // Demo promo codes
        if (this.promoCode.toUpperCase() === 'SAVE10') {
            this.promoDiscount = this.subtotal * 0.1;
            this.promoMessage = { text: '10% discount applied!', type: 'success' };
        } else if (this.promoCode.toUpperCase() === 'FREESHIP') {
            this.promoMessage = { text: 'Free shipping is already included!', type: 'success' };
        } else {
            this.promoDiscount = 0;
            this.promoMessage = { text: 'Invalid promo code', type: 'error' };
        }
    },

    proceedToCheckout() {
        if (this.items.length === 0) return;

        // Save cart data for checkout
        localStorage.setItem('cartTotal', JSON.stringify({
            subtotal: this.subtotal,
            tax: this.tax,
            promoDiscount: this.promoDiscount,
            total: this.total
        }));

        window.location.href = 'checkout.html';
    },

    saveCart() {
        localStorage.setItem('cart', JSON.stringify(this.items));
    },

    clearCart() {
        this.items = [];
        localStorage.removeItem('cart');
        localStorage.removeItem('cartTotal');
    },

    async saveCartToSession() {
        await fetch('/cart', {
            method: 'post',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
            body: JSON.stringify({
                items: this.items
            })
        })
    }
}
