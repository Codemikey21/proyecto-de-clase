<nav class="navbar">
    <div class="navbar-top">
        <div class="nav-logo">
            <a href="{{ url('/product') }}">
                <span class="logo-text">market<span>Place</span></span>
                <span class="logo-sup">UNAB</span>
            </a>
        </div>

        <div class="nav-search">
            <select>
                <option>Todo</option>
                <option>Laptops</option>
                <option>Audio</option>
                <option>Smartphones</option>
                <option>Tablets</option>
                <option>Wearables</option>
            </select>
            <input type="text" placeholder="Buscar productos..." value="{{ request('q') }}">
            <button><i class="fas fa-search"></i></button>
        </div>

        <div class="nav-links">
            <a href="#">
                <small>Hola, Usuario</small>
                <strong>Mi cuenta</strong>
            </a>
            <a href="#">
                <small>Mis</small>
                <strong>Pedidos</strong>
            </a>
            <div class="nav-cart-wrap">
                <a href="#" onclick="toggleCart(); return false;" style="display:flex;align-items:center;gap:6px;padding:6px 12px;border-radius:10px;border:1px solid var(--border);transition:all .2s;" onmouseenter="this.style.borderColor='rgba(255,255,255,0.14)'" onmouseleave="this.style.borderColor='rgba(255,255,255,0.06)'">
                    <span class="cart-count" style="position:relative;top:auto;left:auto;margin-right:2px;">0</span>
                    <i class="fas fa-shopping-bag" style="font-size:17px;"></i>
                    <strong style="font-size:12px;">Carrito</strong>
                </a>
            </div>
        </div>
    </div>

    <div class="navbar-bottom">
        <div class="nb-inner">
            <a href="{{ url('/product') }}"><i class="fas fa-th"></i>&nbsp; Todos</a>
            <a href="#">💻 Laptops</a>
            <a href="#">🎧 Audio</a>
            <a href="#">📱 Smartphones</a>
            <a href="#">📟 Tablets</a>
            <a href="#">⌚ Wearables</a>
            <a href="#">🖱️ Accesorios</a>
            <a href="{{ url('/product/create') }}" class="nb-cta"><i class="fas fa-plus"></i> Publicar</a>
        </div>
    </div>
</nav>
