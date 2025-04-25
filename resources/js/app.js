import './bootstrap';
import Alpine from 'alpinejs'
import cart from "./alpine-apps/cart.js";
import checkout from "./alpine-apps/checkout.js";
import productDetail from "./alpine-apps/product-detail.js";

window.Alpine = Alpine

Alpine.store('cart', {
    on: false,
})

Alpine.data('cart', cart)
Alpine.data('productDetail', productDetail)
Alpine.data('checkout', checkout)

Alpine.start()
