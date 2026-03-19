@extends('layout.app')
@section('title', 'Detalle — MarketPlace UNAB')

@section('content')
<div class="detail-wrap">

    <div class="breadcrumb">
        <a href="{{ route('product.index') }}"><i class="fas fa-home"></i> Inicio</a>
        <span class="sep">›</span>
        <a href="{{ route('product.index') }}">Productos</a>
        <span class="sep">›</span>
        <span>Detalle del Producto</span>
    </div>

    <div class="detail-grid">

        <div class="gallery">
            <div class="gallery-main">
                <img id="mainImg"
                     src="https://placehold.co/500x500/141414/00ff87?text=Producto"
                     alt="Producto">
            </div>
            <div class="gallery-thumbs">
                <div class="thumb active" onclick="changeImg(this,'https://placehold.co/500x500/141414/00ff87?text=Vista+1')">
                    <img src="https://placehold.co/80x80/141414/00ff87?text=1" alt="">
                </div>
                <div class="thumb" onclick="changeImg(this,'https://placehold.co/500x500/141414/00ff87?text=Vista+2')">
                    <img src="https://placehold.co/80x80/141414/00ff87?text=2" alt="">
                </div>
                <div class="thumb" onclick="changeImg(this,'https://placehold.co/500x500/141414/00ff87?text=Vista+3')">
                    <img src="https://placehold.co/80x80/141414/00ff87?text=3" alt="">
                </div>
            </div>
        </div>

        <div class="detail-info">
            <span class="detail-badge new">DISPONIBLE</span>
            <h1 class="detail-title">Nombre del Producto</h1>

            <div class="detail-meta">
                <span class="detail-stars">★★★★★</span>
                <span class="detail-reviews">Producto verificado</span>
                <span class="detail-sold">| Comunidad UNAB</span>
            </div>

            <div class="detail-sku">
                Categoría: <span>Sin categoría</span>
                &nbsp;|&nbsp; Estado: <span style="color:#22c55e;font-weight:700;">Activo</span>
            </div>

            <div class="detail-price-block">
                <div class="price-tag">
                    <span class="price-sym">$</span>
                    <span class="price-big">0</span>
                    <span class="price-dec">.00</span>
                </div>
                <div class="price-installments">
                    <i class="fas fa-credit-card"></i>
                    Hasta 12 cuotas disponibles
                </div>
            </div>

            <div class="detail-stock">
                <div class="stock-dot"></div>
                <span class="stock-label">En stock</span>
                <span style="color:var(--text-sec);font-size:12px;">— Disponible ahora</span>
            </div>

            <div class="qty-row">
                <label>Cantidad:</label>
                <div class="qty-control">
                    <button class="qty-btn" onclick="changeQty(-1)">−</button>
                    <input type="number" id="qty" class="qty-input" value="1" min="1" max="10">
                    <button class="qty-btn" onclick="changeQty(1)">+</button>
                </div>
            </div>

            <div class="detail-actions">
                <button class="btn-add-cart">
                    <i class="fas fa-cart-plus"></i> Añadir al carrito
                </button>
                <button class="btn-buy-now"><i class="fas fa-bolt"></i> Comprar ahora</button>
                <button class="btn-wishlist">
                    <i class="far fa-heart"></i> Guardar en favoritos
                </button>
            </div>

            <div class="secure-row">
                <span><i class="fas fa-shield-alt"></i> Pago seguro</span>
                <span><i class="fas fa-undo"></i> 30 días devolución</span>
                <span><i class="fas fa-award"></i> Garantía 1 año</span>
            </div>
        </div>

        <div class="buy-box">
            <div class="buy-box-price">$0.00</div>
            <div class="buy-box-del">
                <div class="del-row">
                    <span class="del-label"><i class="fas fa-truck"></i> Envío</span>
                    <span class="del-val">GRATIS</span>
                </div>
                <div class="del-row">
                    <span class="del-label"><i class="fas fa-calendar"></i> Llega</span>
                    <span class="del-val paid">Mañana antes 10am</span>
                </div>
                <div class="del-row">
                    <span class="del-label"><i class="fas fa-map-marker-alt"></i> Lugar</span>
                    <span class="del-val paid">Bucaramanga</span>
                </div>
            </div>
            <div class="buy-box-stock"><i class="fas fa-check-circle"></i> En stock</div>
            <div class="buy-box-seller">
                Vendido por: <strong>Comunidad UNAB</strong><br>
                <span style="color:var(--accent);font-size:11px;">★★★★★</span>
                <span style="font-size:11px;color:var(--text-sec);"> Vendedor verificado</span>
            </div>
            <div class="buy-box-actions">
                <button class="btn-add-cart" style="border-radius:10px;">
                    <i class="fas fa-cart-plus"></i> Añadir
                </button>
                <button class="btn-buy-now" style="border-radius:10px;">
                    <i class="fas fa-bolt"></i> Comprar
                </button>
            </div>
            <label class="gift-check">
                <input type="checkbox">
                <i class="fas fa-gift" style="color:var(--accent);font-size:13px;"></i> Es un regalo
            </label>
            <div style="margin-top:12px;font-size:11px;color:var(--text-muted);text-align:center;">
                <i class="fas fa-lock"></i> Transacción segura y encriptada
            </div>
        </div>

    </div>

    <div class="detail-tabs">
        <div class="tab-nav">
            <button class="tab-btn active" onclick="openTab(event,'tab-desc')">Descripción</button>
            <button class="tab-btn" onclick="openTab(event,'tab-specs')">Detalles</button>
            <button class="tab-btn" onclick="openTab(event,'tab-reviews')">Reseñas</button>
        </div>

        <div id="tab-desc" class="tab-panel active">
            <h3>Descripción del Producto</h3>
            <p>Descripción del producto aquí.</p>
        </div>

        <div id="tab-specs" class="tab-panel">
            <h3>Detalles del Producto</h3>
            <table class="specs-table">
                <tr><td>Nombre</td><td>Nombre del producto</td></tr>
                <tr><td>Categoría</td><td>Sin categoría</td></tr>
                <tr><td>Precio</td><td>$0.00 USD</td></tr>
                <tr><td>Estado</td><td style="color:#22c55e;font-weight:700;">Activo</td></tr>
                <tr><td>Disponibilidad</td><td>En stock</td></tr>
            </table>
        </div>

        <div id="tab-reviews" class="tab-panel">
            <h3>Opiniones de Clientes</h3>
            <p style="color:var(--text-sec);font-size:13px;text-align:center;padding:20px 0;">
                Aún no hay reseñas. ¡Sé el primero en opinar!
            </p>
        </div>
    </div>

</div>

<div class="related-section">
    <div class="p-section-hdr" style="margin-bottom:18px;padding-bottom:14px;border-bottom:1px solid var(--border);">
        <h2 style="font-family:var(--font-head);font-size:20px;font-weight:900;letter-spacing:-0.5px;">🔗 También te puede gustar</h2>
        <a href="{{ route('product.index') }}" style="font-size:12px;color:var(--accent);font-weight:600;">Ver todos</a>
    </div>
    <div class="related-grid">
        <div class="pcard">
            <div class="pcard-img"><img src="https://placehold.co/300x300/141414/00ff87?text=AirPods" alt="AirPods"></div>
            <div class="pcard-body"><span class="pcard-type">Audio</span><div class="pcard-name">AirPods Pro 2da Gen</div><div class="pcard-price"><sup>$</sup>249<sub>.00</sub></div></div>
            <div class="pcard-actions"><button class="btn-cart">🛒 Añadir</button></div>
        </div>
        <div class="pcard">
            <div class="pcard-img"><img src="https://placehold.co/300x300/141414/00ff87?text=iPad" alt="iPad"></div>
            <div class="pcard-body"><span class="pcard-type">Tablet</span><div class="pcard-name">iPad Air M1 10.9"</div><div class="pcard-price"><sup>$</sup>599<sub>.00</sub></div></div>
            <div class="pcard-actions"><button class="btn-cart">🛒 Añadir</button></div>
        </div>
        <div class="pcard">
            <div class="pcard-img"><img src="https://placehold.co/300x300/141414/00ff87?text=Mouse" alt="Mouse"></div>
            <div class="pcard-body"><span class="pcard-type">Accesorio</span><div class="pcard-name">Logitech MX Master 3S</div><div class="pcard-price"><sup>$</sup>79<sub>.99</sub></div></div>
            <div class="pcard-actions"><button class="btn-cart">🛒 Añadir</button></div>
        </div>
        <div class="pcard">
            <div class="pcard-img"><img src="https://placehold.co/300x300/141414/00ff87?text=Watch" alt="Watch"></div>
            <div class="pcard-body"><span class="pcard-type">Wearable</span><div class="pcard-name">Samsung Galaxy Watch 6</div><div class="pcard-price"><sup>$</sup>199<sub>.00</sub></div></div>
            <div class="pcard-actions"><button class="btn-cart">🛒 Añadir</button></div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
function changeImg(thumb, src) {
    document.getElementById('mainImg').src = src;
    document.querySelectorAll('.thumb').forEach(t => t.classList.remove('active'));
    thumb.classList.add('active');
}
function changeQty(delta) {
    const input = document.getElementById('qty');
    const val = parseInt(input.value) + delta;
    if (val >= 1 && val <= 10) input.value = val;
}
function openTab(e, tabId) {
    document.querySelectorAll('.tab-panel').forEach(p => p.classList.remove('active'));
    document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
    document.getElementById(tabId).classList.add('active');
    e.currentTarget.classList.add('active');
}
</script>
@endpush
