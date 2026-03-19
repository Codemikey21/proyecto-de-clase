<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'MarketPlace UNAB')</title>
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    @stack('styles')
</head>
<body>

@include('layout.navbar')

<main>
    @yield('content')
</main>

@include('layout.footer')

{{-- MODAL CARRITO GLOBAL --}}
<div class="modal-overlay" id="cartOverlay" onclick="closeCart(event)">
    <div class="cart-panel">
        <div class="cart-panel-hdr">
            <h3>Tu Carrito <span id="cartBadge" style="font-size:14px;color:var(--accent)"></span></h3>
            <div class="cart-close" onclick="toggleCart()">✕</div>
        </div>
        <div class="cart-items" id="cartItems">
            <div class="cart-empty">
                <div class="ico">🛒</div>
                <p>Tu carrito está vacío</p>
            </div>
        </div>
        <div class="cart-footer">
            <div class="cart-total">
                <span>Total</span>
                <strong id="cartTotal">$0.00</strong>
            </div>
            <button class="cart-checkout">
                <i class="fas fa-lock"></i> Proceder al pago
            </button>
        </div>
    </div>
</div>

@stack('scripts')

<script>
// ── CARRITO GLOBAL
let cart = [];

function toggleCart() {
    document.getElementById('cartOverlay').classList.toggle('open');
}

function closeCart(e) {
    if (e.target === document.getElementById('cartOverlay')) toggleCart();
}

function addToCart(name, price, imgSrc) {
    const existing = cart.find(i => i.name === name);
    if (existing) {
        existing.qty++;
    } else {
        cart.push({ name, price, img: imgSrc, qty: 1 });
    }
    renderCart();
    updateNavCount();
    toggleCart();
}

function removeFromCart(idx) {
    cart.splice(idx, 1);
    renderCart();
    updateNavCount();
}

function changeQtyCart(idx, delta) {
    cart[idx].qty = Math.max(1, cart[idx].qty + delta);
    renderCart();
    updateNavCount();
}

function renderCart() {
    const el = document.getElementById('cartItems');
    const totalEl = document.getElementById('cartTotal');
    const badge = document.getElementById('cartBadge');

    if (!cart.length) {
        el.innerHTML = '<div class="cart-empty"><div class="ico">🛒</div><p>Tu carrito está vacío</p></div>';
        totalEl.textContent = '$0.00';
        badge.textContent = '';
        return;
    }

    let total = 0;
    el.innerHTML = cart.map((item, i) => {
        const sub = item.price * item.qty;
        total += sub;
        return `
        <div class="cart-item">
            <div class="cart-item-img">
                <img src="${item.img}" alt="${item.name}">
            </div>
            <div class="cart-item-info">
                <div class="cart-item-name">${item.name}</div>
                <div class="cart-item-price">$${sub.toFixed(2)}</div>
                <div class="cart-qty">
                    <button onclick="changeQtyCart(${i},-1)">−</button>
                    <span>${item.qty}</span>
                    <button onclick="changeQtyCart(${i},1)">+</button>
                </div>
            </div>
            <button class="cart-item-remove" onclick="removeFromCart(${i})">×</button>
        </div>`;
    }).join('');

    totalEl.textContent = '$' + total.toFixed(2);
    badge.textContent = '(' + cart.reduce((s, i) => s + i.qty, 0) + ')';
}

function updateNavCount() {
    const count = cart.reduce((s, i) => s + i.qty, 0);
    document.querySelectorAll('.cart-count').forEach(el => el.textContent = count);
}
</script>
</body>
</html>
