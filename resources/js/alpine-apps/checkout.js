export default () => ({
    currentStep: 1,
    stepNames: ['Shipping', 'Payment', 'Confirmation'],
    cartItems: [],
    cartTotal: {
        subtotal: 0,
        tax: 0,
        promoDiscount: 0,
        total: 0
    },
    form: {
        // Shipping info
        email: '',
        phone: '',
        firstName: '',
        lastName: '',
        address: '',
        address2: '',
        city: '',
        state: '',
        zip: '',
        country: 'US',
        shippingMethod: 'standard',
        instructions: '',
        saveInfo: false,

        // Payment info
        paymentMethod: 'credit',
        cardName: '',
        cardNumber: '',
        cardExpiry: '',
        cardCvv: '',
        sameAsShipping: true,
        billingFirstName: '',
        billingLastName: '',
        billingAddress: '',
        billingCity: '',
        billingZip: '',
        savePayment: false
    },
    errors: {},

    init() {
        // Load cart items from localStorage
        const savedCart = localStorage.getItem('cart');
        if (savedCart) {
            this.cartItems = JSON.parse(savedCart);
        }

        // Load cart totals from localStorage
        const savedCartTotal = localStorage.getItem('cartTotal');
        if (savedCartTotal) {
            this.cartTotal = JSON.parse(savedCartTotal);
        }

        // If no items in cart, redirect to cart page
        if (!this.cartItems.length) {
            this.cartItems = [
                {
                    id: 1,
                    name: 'Wireless Headphones',
                    color: 'Black',
                    price: 129.99,
                    quantity: 1,
                    image: '/placeholder.svg?height=100&width=100'
                },
                {
                    id: 2,
                    name: 'Smart Watch',
                    color: 'Silver',
                    price: 199.99,
                    quantity: 1,
                    image: '/placeholder.svg?height=100&width=100'
                },
                {
                    id: 3,
                    name: 'Bluetooth Speaker',
                    color: 'Blue',
                    price: 69.99,
                    quantity: 1,
                    image: '/placeholder.svg?height=100&width=100'
                }
            ];

            this.cartTotal = {
                subtotal: 399.97,
                tax: 32.00,
                promoDiscount: 0,
                total: 431.97
            };
        }

        // Load saved shipping info if available
        const savedShippingInfo = localStorage.getItem('shippingInfo');
        if (savedShippingInfo) {
            const shippingInfo = JSON.parse(savedShippingInfo);
            Object.keys(shippingInfo).forEach(key => {
                if (this.form[key] !== undefined) {
                    this.form[key] = shippingInfo[key];
                }
            });
        }
    },

    get totalItems() {
        return this.cartItems.reduce((total, item) => total + item.quantity, 0);
    },

    formatCurrency(value) {
        return '$' + value.toFixed(2);
    },

    validateShipping() {
        this.errors = {};
        let isValid = true;

        // Basic validation
        if (!this.form.email) {
            this.errors.email = 'Email is required';
            isValid = false;
        } else if (!/^\S+@\S+\.\S+$/.test(this.form.email)) {
            this.errors.email = 'Please enter a valid email address';
            isValid = false;
        }

        if (!this.form.phone) {
            this.errors.phone = 'Phone number is required';
            isValid = false;
        }

        if (!this.form.firstName) {
            this.errors.firstName = 'First name is required';
            isValid = false;
        }

        if (!this.form.lastName) {
            this.errors.lastName = 'Last name is required';
            isValid = false;
        }

        if (!this.form.address) {
            this.errors.address = 'Address is required';
            isValid = false;
        }

        if (!this.form.city) {
            this.errors.city = 'City is required';
            isValid = false;
        }

        if (!this.form.state) {
            this.errors.state = 'State is required';
            isValid = false;
        }

        if (!this.form.zip) {
            this.errors.zip = 'ZIP code is required';
            isValid = false;
        }

        if (isValid) {
            // Save shipping info if requested
            if (this.form.saveInfo) {
                const shippingInfo = {
                    email: this.form.email,
                    phone: this.form.phone,
                    firstName: this.form.firstName,
                    lastName: this.form.lastName,
                    address: this.form.address,
                    address2: this.form.address2,
                    city: this.form.city,
                    state: this.form.state,
                    zip: this.form.zip,
                    country: this.form.country
                };
                localStorage.setItem('shippingInfo', JSON.stringify(shippingInfo));
            }

            // Proceed to next step
            this.currentStep = 2;
            window.scrollTo(0, 0);
        }
    },

    validatePayment() {
        this.errors = {};
        let isValid = true;

        if (this.form.paymentMethod === 'credit') {
            if (!this.form.cardName) {
                this.errors.cardName = 'Name on card is required';
                isValid = false;
            }

            if (!this.form.cardNumber) {
                this.errors.cardNumber = 'Card number is required';
                isValid = false;
            } else if (this.form.cardNumber.replace(/\s/g, '').length !== 16) {
                this.errors.cardNumber = 'Please enter a valid card number';
                isValid = false;
            }

            if (!this.form.cardExpiry) {
                this.errors.cardExpiry = 'Expiration date is required';
                isValid = false;
            } else if (!/^\d\d\/\d\d$/.test(this.form.cardExpiry)) {
                this.errors.cardExpiry = 'Please use MM/YY format';
                isValid = false;
            }

            if (!this.form.cardCvv) {
                this.errors.cardCvv = 'CVV is required';
                isValid = false;
            } else if (!/^\d{3,4}$/.test(this.form.cardCvv)) {
                this.errors.cardCvv = 'Please enter a valid CVV';
                isValid = false;
            }
        }

        if (!this.form.sameAsShipping) {
            if (!this.form.billingFirstName) {
                this.errors.billingFirstName = 'First name is required';
                isValid = false;
            }

            if (!this.form.billingLastName) {
                this.errors.billingLastName = 'Last name is required';
                isValid = false;
            }

            if (!this.form.billingAddress) {
                this.errors.billingAddress = 'Address is required';
                isValid = false;
            }

            if (!this.form.billingCity) {
                this.errors.billingCity = 'City is required';
                isValid = false;
            }

            if (!this.form.billingZip) {
                this.errors.billingZip = 'ZIP code is required';
                isValid = false;
            }
        }

        if (isValid) {
            // Process payment (in a real app, this would call a payment API)
            // For demo purposes, we'll just proceed to confirmation
            this.currentStep = 3;
            window.scrollTo(0, 0);
        }
    },

    getShippingMethodText() {
        switch (this.form.shippingMethod) {
            case 'standard':
                return 'Standard Shipping (3-5 business days)';
            case 'express':
                return 'Express Shipping (1-2 business days)';
            case 'overnight':
                return 'Overnight Shipping (Next business day)';
            default:
                return 'Standard Shipping';
        }
    },

    getPaymentMethodText() {
        switch (this.form.paymentMethod) {
            case 'credit':
                return 'Credit Card (•••• ' + this.form.cardNumber.slice(-4) + ')';
            case 'paypal':
                return 'PayPal';
            case 'apple':
                return 'Apple Pay';
            case 'google':
                return 'Google Pay';
            default:
                return 'Credit Card';
        }
    },

    getCountryName(code) {
        const countries = {
            'US': 'United States',
            'CA': 'Canada',
            'UK': 'United Kingdom',
            'AU': 'Australia'
        };
        return countries[code] || code;
    },

    getEstimatedDelivery() {
        const today = new Date();
        let days;

        switch (this.form.shippingMethod) {
            case 'standard':
                days = 5;
                break;
            case 'express':
                days = 2;
                break;
            case 'overnight':
                days = 1;
                break;
            default:
                days = 5;
        }

        const deliveryDate = new Date(today);
        deliveryDate.setDate(today.getDate() + days);

        return 'Estimated delivery: ' + deliveryDate.toLocaleDateString('en-US', {
            month: 'long',
            day: 'numeric',
            year: 'numeric'
        });
    },

    getCurrentDate() {
        return new Date().toLocaleDateString('en-US', {month: 'long', day: 'numeric', year: 'numeric'});
    },

    generateOrderNumber() {
        return Math.floor(10000000 + Math.random() * 90000000).toString();
    },

    clearCart() {
        localStorage.removeItem('cart');
        localStorage.removeItem('cartTotal');
    }
})
