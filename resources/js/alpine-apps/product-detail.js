export default {
    quantity: 1,

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
}
