export default () => ({
    items: [],
    promoCode: '',
    promoDiscount: 0,
    promoMessage: { text: '', type: '' },
    taxRate: 0.08,

    init() {
        // Load cart from localStorage
        const savedCart = localStorage.getItem('cart');
        if (savedCart) {
            this.items = JSON.parse(savedCart);
        } else {
            // Sample data for demonstration
            this.items = [
                { id: 1, name: 'Wireless Headphones', color: 'Black', price: 129.99, quantity: 1, image: '/placeholder.svg?height=100&width=100' },
                { id: 2, name: 'Smart Watch', color: 'Silver', price: 199.99, quantity: 1, image: '/placeholder.svg?height=100&width=100' },
                { id: 3, name: 'Bluetooth Speaker', color: 'Blue', price: 69.99, quantity: 1, image: '/placeholder.svg?height=100&width=100' }
            ];
            this.saveCart();
        }
    },

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
        return '$' + value.toFixed(2);
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
    }
})
