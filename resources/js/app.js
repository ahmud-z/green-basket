import './bootstrap';
import Alpine from 'alpinejs'
import cart from "./alpine-apps/cart.js";
import productDetail from "./alpine-apps/product-detail.js";
import {mask} from "@alpinejs/mask";

window.Alpine = Alpine

Alpine.plugin(mask)

Alpine.store('cart', cart)
Alpine.store('productDetail', productDetail)

Alpine.start()
