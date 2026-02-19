<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MarketPlace — Detalle del Producto</title>
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        /* ── Estilos exclusivos del detalle ── */

        .detail-wrap {
            max-width: 1200px;
            margin: 0 auto;
            padding: 24px 20px 60px;
        }

        .breadcrumb {
            font-size: 13px;
            color: var(--text-sec);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 6px;
            flex-wrap: wrap;
        }
        .breadcrumb a { color: #0066c0; text-decoration: none; }
        .breadcrumb a:hover { text-decoration: underline; color: #c45500; }
        .breadcrumb .sep { color: var(--text-muted); }

        /* Layout principal 2 columnas */
        .detail-grid {
            display: grid;
            grid-template-columns: 1fr 1fr 340px;
            gap: 24px;
            align-items: start;
        }

        /* ── Galería de imágenes ── */
        .gallery {
            background: var(--white);
            border-radius: var(--r);
            box-shadow: var(--shadow);
            padding: 20px;
            position: sticky;
            top: 80px;
        }
        .gallery-main {
            width: 100%;
            height: 340px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f5f6f6;
            border-radius: 6px;
            overflow: hidden;
            margin-bottom: 14px;
        }
        .gallery-main img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
            transition: transform .3s;
        }
        .gallery-main img:hover { transform: scale(1.05); }

        .gallery-thumbs {
            display: flex;
            gap: 8px;
            justify-content: center;
        }
        .thumb {
            width: 60px; height: 60px;
            border: 2px solid var(--border);
            border-radius: 6px;
            overflow: hidden;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f5f6f6;
            padding: 4px;
            transition: border-color .15s;
        }
        .thumb:hover, .thumb.active { border-color: var(--accent); }
        .thumb img { max-width: 100%; max-height: 100%; object-fit: contain; }

        /* ── Info del producto ── */
        .detail-info {
            background: var(--white);
            border-radius: var(--r);
            box-shadow: var(--shadow);
            padding: 24px;
        }

        .detail-badge {
            display: inline-block;
            background: var(--red);
            color: #fff;
            font-size: 11px;
            font-weight: 700;
            padding: 3px 10px;
            border-radius: 3px;
            margin-bottom: 10px;
            letter-spacing: .3px;
        }
        .detail-badge.new { background: #0a7a0a; }

        .detail-title {
            font-size: 20px;
            font-weight: 600;
            line-height: 1.4;
            color: var(--text);
            margin-bottom: 10px;
        }

        .detail-meta {
            display: flex;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
            margin-bottom: 14px;
            padding-bottom: 14px;
            border-bottom: 1px solid var(--border);
        }
        .detail-stars { color: var(--accent); font-size: 15px; letter-spacing: 1px; }
        .detail-reviews { font-size: 13px; color: #0066c0; cursor: pointer; }
        .detail-reviews:hover { text-decoration: underline; }
        .detail-sold { font-size: 13px; color: var(--text-sec); }

        .detail-sku {
            font-size: 12px;
            color: var(--text-muted);
            margin-bottom: 16px;
        }
        .detail-sku span { color: var(--text-sec); }

        /* Precio */
        .detail-price-block {
            background: #fffbf3;
            border-radius: 6px;
            padding: 16px;
            margin-bottom: 18px;
        }
        .price-tag {
            display: flex;
            align-items: baseline;
            gap: 4px;
            margin-bottom: 4px;
        }
        .price-sym { font-size: 16px; font-weight: 700; color: var(--text); }
        .price-big { font-size: 34px; font-weight: 700; color: var(--text); line-height: 1; }
        .price-dec { font-size: 16px; font-weight: 700; color: var(--text); align-self: flex-start; margin-top: 4px; }
        .price-old { font-size: 13px; color: var(--text-muted); text-decoration: line-through; margin-bottom: 2px; }
        .price-save { font-size: 13px; color: var(--red); font-weight: 600; }
        .price-installments {
            font-size: 13px;
            color: var(--green);
            margin-top: 6px;
        }

        /* Stock */
        .detail-stock {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 16px;
            font-size: 14px;
        }
        .stock-dot {
            width: 10px; height: 10px;
            border-radius: 50%;
            background: var(--green);
            flex-shrink: 0;
        }
        .stock-dot.low { background: var(--accent); }
        .stock-dot.out { background: var(--red); }
        .stock-label { color: var(--green); font-weight: 600; }
        .stock-label.low { color: var(--accent); }
        .stock-label.out { color: var(--red); }

        /* Cantidad */
        .qty-row {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 16px;
        }
        .qty-row label { font-size: 13px; font-weight: 700; color: var(--text); }
        .qty-control {
            display: flex;
            align-items: center;
            border: 1px solid var(--border);
            border-radius: 6px;
            overflow: hidden;
        }
        .qty-btn {
            width: 36px; height: 36px;
            background: #f5f6f6;
            border: none;
            cursor: pointer;
            font-size: 18px;
            font-weight: 700;
            color: var(--text);
            transition: background .15s;
            display: flex; align-items: center; justify-content: center;
        }
        .qty-btn:hover { background: var(--border); }
        .qty-input {
            width: 50px; height: 36px;
            border: none;
            border-left: 1px solid var(--border);
            border-right: 1px solid var(--border);
            text-align: center;
            font-size: 15px;
            font-weight: 600;
            font-family: var(--font);
            outline: none;
        }

        /* Botones de acción */
        .detail-actions {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-bottom: 18px;
        }
        .btn-add-cart {
            background: var(--yellow);
            border: 1px solid #f0c800;
            border-radius: 24px;
            padding: 13px;
            font-size: 15px;
            font-weight: 700;
            font-family: var(--font);
            cursor: pointer;
            width: 100%;
            transition: background .15s;
            display: flex; align-items: center; justify-content: center; gap: 8px;
        }
        .btn-add-cart:hover { background: var(--yellow-h); }

        .btn-buy-now {
            background: var(--accent);
            border: 1px solid #c45500;
            border-radius: 24px;
            padding: 13px;
            font-size: 15px;
            font-weight: 700;
            font-family: var(--font);
            cursor: pointer;
            width: 100%;
            color: #fff;
            transition: background .15s;
            display: flex; align-items: center; justify-content: center; gap: 8px;
        }
        .btn-buy-now:hover { background: var(--accent-h); }

        .btn-wishlist {
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 24px;
            padding: 11px;
            font-size: 14px;
            font-family: var(--font);
            cursor: pointer;
            width: 100%;
            color: var(--text);
            transition: background .15s, border-color .15s;
            display: flex; align-items: center; justify-content: center; gap: 8px;
        }
        .btn-wishlist:hover { background: #f5f6f6; border-color: #aaa; }

        /* Secure badges */
        .secure-row {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 16px;
            padding-top: 14px;
            border-top: 1px solid var(--border);
            font-size: 12px;
            color: var(--text-sec);
        }
        .secure-row span { display: flex; align-items: center; gap: 4px; }
        .secure-row i { color: var(--green); }

        /* ── Panel de compra (columna derecha) ── */
        .buy-box {
            background: var(--white);
            border-radius: var(--r);
            box-shadow: var(--shadow);
            padding: 20px;
            position: sticky;
            top: 80px;
        }
        .buy-box-price {
            font-size: 26px;
            font-weight: 700;
            margin-bottom: 8px;
        }
        .buy-box-del {
            background: #f5f6f6;
            border-radius: 6px;
            padding: 12px;
            font-size: 13px;
            margin-bottom: 14px;
        }
        .buy-box-del .del-row {
            display: flex;
            justify-content: space-between;
            padding: 5px 0;
            border-bottom: 1px solid var(--border);
        }
        .buy-box-del .del-row:last-child { border-bottom: none; }
        .del-label { color: var(--text-sec); }
        .del-val { font-weight: 600; color: var(--green); }
        .del-val.paid { color: var(--text); }

        .buy-box-stock {
            font-size: 16px;
            font-weight: 600;
            color: var(--green);
            margin-bottom: 14px;
        }

        .buy-box-seller {
            font-size: 13px;
            color: var(--text-sec);
            margin-bottom: 16px;
            padding: 12px;
            background: #f5f6f6;
            border-radius: 6px;
        }
        .buy-box-seller strong { color: #0066c0; }

        .buy-box-actions {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .gift-check {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            color: var(--text-sec);
            margin-top: 12px;
            cursor: pointer;
        }
        .gift-check input { accent-color: var(--accent); }

        /* ── Descripción / Tabs ── */
        .detail-tabs {
            background: var(--white);
            border-radius: var(--r);
            box-shadow: var(--shadow);
            margin-top: 24px;
            overflow: hidden;
        }
        .tab-nav {
            display: flex;
            border-bottom: 2px solid var(--border);
            overflow-x: auto;
        }
        .tab-btn {
            padding: 14px 24px;
            font-size: 14px;
            font-weight: 600;
            font-family: var(--font);
            cursor: pointer;
            background: none;
            border: none;
            border-bottom: 3px solid transparent;
            color: var(--text-sec);
            white-space: nowrap;
            transition: color .15s, border-color .15s;
            margin-bottom: -2px;
        }
        .tab-btn.active { color: var(--accent); border-bottom-color: var(--accent); }
        .tab-btn:hover  { color: var(--text); }

        .tab-panel { display: none; padding: 24px; }
        .tab-panel.active { display: block; }

        .tab-panel h3 { font-size: 16px; font-weight: 700; margin-bottom: 14px; color: var(--text); }
        .tab-panel p  { font-size: 14px; color: var(--text-sec); line-height: 1.7; margin-bottom: 12px; }

        .specs-table { width: 100%; border-collapse: collapse; font-size: 14px; }
        .specs-table tr:nth-child(even) { background: #f5f6f6; }
        .specs-table td { padding: 10px 14px; border-bottom: 1px solid var(--border); }
        .specs-table td:first-child { font-weight: 600; color: var(--text); width: 200px; }
        .specs-table td:last-child  { color: var(--text-sec); }

        /* Reviews */
        .review-summary {
            display: flex;
            gap: 32px;
            align-items: center;
            margin-bottom: 24px;
            padding-bottom: 20px;
            border-bottom: 1px solid var(--border);
        }
        .review-big-num {
            font-size: 60px;
            font-weight: 700;
            line-height: 1;
            color: var(--text);
        }
        .review-big-stars { color: var(--accent); font-size: 20px; letter-spacing: 2px; }
        .review-total { font-size: 13px; color: var(--text-sec); margin-top: 4px; }
        .review-bars { flex: 1; display: flex; flex-direction: column; gap: 5px; }
        .bar-row { display: flex; align-items: center; gap: 10px; font-size: 12px; }
        .bar-track { flex: 1; height: 8px; background: var(--border); border-radius: 4px; overflow: hidden; }
        .bar-fill  { height: 100%; background: var(--accent); border-radius: 4px; }
        .bar-count { color: var(--text-sec); min-width: 30px; text-align: right; }

        .review-item {
            padding: 16px 0;
            border-bottom: 1px solid var(--border);
        }
        .review-item:last-child { border-bottom: none; }
        .review-header {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 6px;
        }
        .review-avatar {
            width: 36px; height: 36px;
            border-radius: 50%;
            background: var(--nav-mid);
            color: #fff;
            display: flex; align-items: center; justify-content: center;
            font-size: 14px;
            font-weight: 700;
            flex-shrink: 0;
        }
        .review-name  { font-weight: 700; font-size: 13px; }
        .review-date  { font-size: 12px; color: var(--text-muted); margin-left: auto; }
        .review-stars { color: var(--accent); font-size: 13px; }
        .review-title { font-weight: 600; font-size: 14px; margin-bottom: 4px; }
        .review-body  { font-size: 13px; color: var(--text-sec); line-height: 1.6; }
        .review-verified {
            font-size: 11px;
            color: var(--green);
            margin-top: 6px;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        /* Productos relacionados */
        .related-section {
            max-width: 1200px;
            margin: 28px auto 0;
            padding: 0 20px 48px;
        }
        .sec-title {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 16px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--border);
        }
        .related-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 14px;
        }

        @media (max-width: 900px) {
            .detail-grid { grid-template-columns: 1fr; }
            .gallery, .buy-box { position: static; }
        }
        @media (max-width: 640px) {
            .review-summary { flex-direction: column; align-items: flex-start; gap: 16px; }
            .tab-btn { padding: 12px 16px; font-size: 13px; }
        }
    </style>
</head>
<body>

<!-- ===================== NAVBAR ===================== -->
<nav class="navbar">
    <div class="navbar-top">

        <div class="nav-logo">
            <a href="#">
                <span class="logo-text">market<span>Place</span></span>
                <span class="logo-sup">UNAB</span>
            </a>
        </div>

        <div class="nav-search">
            <select>
                <option>Todo</option>
                <option>Electrónica</option>
                <option>Ropa</option>
                <option>Hogar</option>
                <option>Deportes</option>
                <option>Libros</option>
            </select>
            <input type="text" placeholder="Buscar productos, marcas y más...">
            <button><i class="fas fa-search"></i></button>
        </div>

        <div class="nav-links">
            <a href="#">
                <small>Hola, Usuario</small>
                <strong>Mi cuenta <i class="fas fa-caret-down" style="font-size:10px"></i></strong>
            </a>
            <a href="#">
                <small>Mis</small>
                <strong>Pedidos</strong>
            </a>
            <div class="nav-cart-wrap">
                <a href="#" style="display:flex;align-items:center;gap:5px;">
                    <span class="cart-count">3</span>
                    <i class="fas fa-shopping-cart" style="font-size:24px;"></i>
                    <strong>Carrito</strong>
                </a>
            </div>
        </div>

    </div>

    <div class="navbar-bottom">
        <a href="#"><i class="fas fa-bars"></i>&nbsp; Todas las categorías</a>
        <a href="#">🔥 Ofertas del día</a>
        <a href="#">⚡ Flash Sale</a>
        <a href="#">Electrónica</a>
        <a href="#">Ropa</a>
        <a href="#">Hogar</a>
        <a href="#">Deportes</a>
        <a href="#">Libros</a>
        <a href="#" class="nb-cta">
            <i class="fas fa-plus"></i> Nuevo Producto
        </a>
    </div>
</nav>

<!-- ===================== MAIN ===================== -->
<main>
    <div class="detail-wrap">

        <!-- Breadcrumb -->
        <div class="breadcrumb">
            <a href="#"><i class="fas fa-home"></i> Inicio</a>
            <span class="sep">›</span>
            <a href="#">Electrónica</a>
            <span class="sep">›</span>
            <a href="#">Smartphones</a>
            <span class="sep">›</span>
            <span>Smartphone Pro Max 256GB</span>
        </div>

        <!-- Grid principal -->
        <div class="detail-grid">

            <!-- Columna 1: Galería -->
            <div class="gallery">
                <div class="gallery-main">
                    <img id="mainImg"
                         src="https://placehold.co/500x500/f0f2f2/555?text=Smartphone+Pro"
                         alt="Smartphone Pro Max">
                </div>
                <div class="gallery-thumbs">
                    <div class="thumb active" onclick="changeImg(this, 'https://placehold.co/500x500/f0f2f2/555?text=Vista+1')">
                        <img src="https://placehold.co/80x80/f0f2f2/555?text=1" alt="">
                    </div>
                    <div class="thumb" onclick="changeImg(this, 'https://placehold.co/500x500/f0f2f2/555?text=Vista+2')">
                        <img src="https://placehold.co/80x80/f0f2f2/555?text=2" alt="">
                    </div>
                    <div class="thumb" onclick="changeImg(this, 'https://placehold.co/500x500/f0f2f2/555?text=Vista+3')">
                        <img src="https://placehold.co/80x80/f0f2f2/555?text=3" alt="">
                    </div>
                    <div class="thumb" onclick="changeImg(this, 'https://placehold.co/500x500/f0f2f2/555?text=Vista+4')">
                        <img src="https://placehold.co/80x80/f0f2f2/555?text=4" alt="">
                    </div>
                </div>
            </div>

            <!-- Columna 2: Info -->
            <div class="detail-info">
                <span class="detail-badge">-35% OFERTA</span>
                <h1 class="detail-title">
                    Smartphone Pro Max 256GB – Pantalla AMOLED 6.7" Batería 5000mAh
                    Cámara 200MP con IA
                </h1>

                <div class="detail-meta">
                    <span class="detail-stars">★★★★★</span>
                    <a href="#reviews" class="detail-reviews">2,847 valoraciones</a>
                    <span class="detail-sold">| 15,230 vendidos</span>
                </div>

                <div class="detail-sku">
                    SKU: <span>PROD-001</span> &nbsp;|&nbsp;
                    Tipo: <span>Electrónica</span> &nbsp;|&nbsp;
                    Estado: <span style="color:var(--green); font-weight:600;">Activo</span>
                </div>

                <!-- Precio -->
                <div class="detail-price-block">
                    <div class="price-old">Precio anterior: <s>$999.99</s></div>
                    <div class="price-tag">
                        <span class="price-sym">$</span>
                        <span class="price-big">649</span>
                        <span class="price-dec">.99</span>
                    </div>
                    <div class="price-save">🏷️ Ahorras $350.00 (35%) — Oferta por tiempo limitado</div>
                    <div class="price-installments">
                        <i class="fas fa-credit-card"></i>
                        Hasta 12 cuotas sin interés de $54.17/mes
                    </div>
                </div>

                <!-- Stock -->
                <div class="detail-stock">
                    <div class="stock-dot"></div>
                    <span class="stock-label">En stock</span>
                    <span style="color:var(--text-sec); font-size:13px;">— Solo quedan 8 unidades</span>
                </div>

                <!-- Cantidad -->
                <div class="qty-row">
                    <label>Cantidad:</label>
                    <div class="qty-control">
                        <button class="qty-btn" onclick="changeQty(-1)">−</button>
                        <input type="number" id="qty" class="qty-input" value="1" min="1" max="8">
                        <button class="qty-btn" onclick="changeQty(1)">+</button>
                    </div>
                </div>

                <!-- Botones -->
                <div class="detail-actions">
                    <button class="btn-add-cart">
                        <i class="fas fa-cart-plus"></i> Añadir al carrito
                    </button>
                    <button class="btn-buy-now">
                        <i class="fas fa-bolt"></i> Comprar ahora
                    </button>
                    <button class="btn-wishlist">
                        <i class="far fa-heart"></i> Guardar en lista de deseos
                    </button>
                </div>

                <!-- Seguridad -->
                <div class="secure-row">
                    <span><i class="fas fa-shield-alt"></i> Pago seguro</span>
                    <span><i class="fas fa-undo"></i> 30 días devolución</span>
                    <span><i class="fas fa-award"></i> Garantía 1 año</span>
                </div>
            </div>

            <!-- Columna 3: Buy Box -->
            <div class="buy-box">
                <div class="buy-box-price">
                    <sup style="font-size:16px;">$</sup>649<sup style="font-size:16px;">.99</sup>
                </div>

                <div class="buy-box-del">
                    <div class="del-row">
                        <span class="del-label"><i class="fas fa-truck"></i> Envío</span>
                        <span class="del-val">GRATIS</span>
                    </div>
                    <div class="del-row">
                        <span class="del-label"><i class="fas fa-calendar"></i> Llega</span>
                        <span class="del-val paid">Mañana antes de las 10am</span>
                    </div>
                    <div class="del-row">
                        <span class="del-label"><i class="fas fa-map-marker-alt"></i> Entregar en</span>
                        <span class="del-val paid">Bucaramanga, Colombia</span>
                    </div>
                </div>

                <div class="buy-box-stock">
                    <i class="fas fa-check-circle"></i> En stock
                </div>

                <div class="buy-box-seller">
                    Vendido por: <strong>TechStore CO</strong><br>
                    <span style="color:var(--green);font-size:12px;">★★★★★</span>
                    <span style="font-size:12px;"> Vendedor verificado</span>
                </div>

                <div class="buy-box-actions">
                    <button class="btn-add-cart" style="border-radius:6px;">
                        <i class="fas fa-cart-plus"></i> Añadir al carrito
                    </button>
                    <button class="btn-buy-now" style="border-radius:6px;">
                        <i class="fas fa-bolt"></i> Comprar ahora
                    </button>
                </div>

                <label class="gift-check">
                    <input type="checkbox"> <i class="fas fa-gift" style="color:var(--accent);"></i>
                    Este es un regalo (incluir empaque especial)
                </label>

                <div style="margin-top:14px; font-size:12px; color:var(--text-muted); text-align:center;">
                    <i class="fas fa-lock"></i> Transacción segura y encriptada
                </div>
            </div>

        </div><!-- /detail-grid -->

        <!-- Tabs: Descripción / Especificaciones / Reseñas -->
        <div class="detail-tabs">
            <div class="tab-nav">
                <button class="tab-btn active" onclick="openTab(event, 'tab-desc')">Descripción</button>
                <button class="tab-btn" onclick="openTab(event, 'tab-specs')">Especificaciones</button>
                <button class="tab-btn" onclick="openTab(event, 'tab-reviews')" id="reviews">Reseñas (2,847)</button>
            </div>

            <!-- Descripción -->
            <div id="tab-desc" class="tab-panel active">
                <h3>Descripción del Producto</h3>
                <p>
                    El <strong>Smartphone Pro Max 256GB</strong> redefine la experiencia móvil con su pantalla
                    AMOLED de 6.7 pulgadas que ofrece colores vibrantes y negros profundos con una tasa de
                    refresco de 120Hz para una experiencia ultra fluida.
                </p>
                <p>
                    Su cámara principal de <strong>200MP con Inteligencia Artificial</strong> captura cada
                    detalle con una nitidez extraordinaria, incluso en condiciones de poca luz gracias al
                    modo nocturno avanzado. El sistema de triple cámara incluye gran angular, ultra gran
                    angular y teleobjetivo con zoom óptico 10x.
                </p>
                <p>
                    Con la potente batería de <strong>5000mAh</strong> y carga rápida de 65W, tendrás energía
                    todo el día y cargará al 100% en menos de 40 minutos. Compatible con carga inalámbrica
                    de 15W y carga inversa.
                </p>
                <p>
                    El procesador octa-core de última generación garantiza un rendimiento excepcional para
                    gaming, multitarea y uso profesional. Incluye 12GB de RAM y 256GB de almacenamiento
                    interno expandible.
                </p>
                <p><strong>Contenido del paquete:</strong> Smartphone, cable USB-C, cargador 65W,
                    audífonos USB-C, funda protectora, lámina protectora pre-instalada, manual de usuario.</p>
            </div>

            <!-- Especificaciones -->
            <div id="tab-specs" class="tab-panel">
                <h3>Especificaciones Técnicas</h3>
                <table class="specs-table">
                    <tr><td>Pantalla</td><td>AMOLED 6.7" 120Hz, 2400×1080px, 395ppi</td></tr>
                    <tr><td>Procesador</td><td>Octa-core 3.2GHz, 4nm</td></tr>
                    <tr><td>RAM</td><td>12 GB LPDDR5</td></tr>
                    <tr><td>Almacenamiento</td><td>256 GB UFS 3.1 + microSD hasta 1TB</td></tr>
                    <tr><td>Cámara Principal</td><td>200 MP f/1.7, OIS, IA</td></tr>
                    <tr><td>Cámara Frontal</td><td>32 MP f/2.2, AutoFocus</td></tr>
                    <tr><td>Batería</td><td>5000 mAh, carga 65W, inalámbrica 15W</td></tr>
                    <tr><td>Sistema Operativo</td><td>Android 14</td></tr>
                    <tr><td>Conectividad</td><td>5G, WiFi 6E, Bluetooth 5.3, NFC, USB-C 3.2</td></tr>
                    <tr><td>Resistencia</td><td>IP68 — agua hasta 2m por 30 minutos</td></tr>
                    <tr><td>Dimensiones</td><td>162.3 × 75.6 × 8.1 mm</td></tr>
                    <tr><td>Peso</td><td>195 g</td></tr>
                    <tr><td>Colores</td><td>Negro Cosmos, Plata Lunar, Verde Bosque</td></tr>
                    <tr><td>Garantía</td><td>12 meses oficial + 6 meses adicionales con registro</td></tr>
                    <tr><td>SKU</td><td>PROD-001</td></tr>
                    <tr><td>Tipo</td><td>Electrónica — Smartphones</td></tr>
                </table>
            </div>

            <!-- Reseñas -->
            <div id="tab-reviews" class="tab-panel">
                <h3>Opiniones de Clientes</h3>

                <div class="review-summary">
                    <div style="text-align:center;">
                        <div class="review-big-num">4.9</div>
                        <div class="review-big-stars">★★★★★</div>
                        <div class="review-total">2,847 reseñas</div>
                    </div>
                    <div class="review-bars">
                        <div class="bar-row">
                            <span>5★</span>
                            <div class="bar-track"><div class="bar-fill" style="width:82%"></div></div>
                            <span class="bar-count">2,334</span>
                        </div>
                        <div class="bar-row">
                            <span>4★</span>
                            <div class="bar-track"><div class="bar-fill" style="width:12%"></div></div>
                            <span class="bar-count">341</span>
                        </div>
                        <div class="bar-row">
                            <span>3★</span>
                            <div class="bar-track"><div class="bar-fill" style="width:4%"></div></div>
                            <span class="bar-count">113</span>
                        </div>
                        <div class="bar-row">
                            <span>2★</span>
                            <div class="bar-track"><div class="bar-fill" style="width:1%"></div></div>
                            <span class="bar-count">28</span>
                        </div>
                        <div class="bar-row">
                            <span>1★</span>
                            <div class="bar-track"><div class="bar-fill" style="width:1%"></div></div>
                            <span class="bar-count">31</span>
                        </div>
                    </div>
                </div>

                <div class="review-item">
                    <div class="review-header">
                        <div class="review-avatar">JR</div>
                        <div>
                            <div class="review-name">Juan Rodríguez</div>
                            <div class="review-stars">★★★★★</div>
                        </div>
                        <div class="review-date">12 Feb 2026</div>
                    </div>
                    <div class="review-title">Increíble cámara, el mejor que he tenido</div>
                    <div class="review-body">
                        La cámara de 200MP es simplemente espectacular. Las fotos nocturnas son
                        increíbles comparadas con mi teléfono anterior. La batería dura todo el día
                        con uso intensivo. Muy satisfecho con la compra.
                    </div>
                    <div class="review-verified">
                        <i class="fas fa-check-circle"></i> Compra verificada
                    </div>
                </div>

                <div class="review-item">
                    <div class="review-header">
                        <div class="review-avatar" style="background:#c45500;">ML</div>
                        <div>
                            <div class="review-name">María López</div>
                            <div class="review-stars">★★★★★</div>
                        </div>
                        <div class="review-date">8 Feb 2026</div>
                    </div>
                    <div class="review-title">Llegó antes de lo esperado y en perfecto estado</div>
                    <div class="review-body">
                        El envío fue rapidísimo, llegó al día siguiente. El teléfono viene con todo
                        lo que describe: funda, cargador rápido, audífonos. La pantalla es hermosa
                        y el rendimiento es top. Lo recomiendo 100%.
                    </div>
                    <div class="review-verified">
                        <i class="fas fa-check-circle"></i> Compra verificada
                    </div>
                </div>

                <div class="review-item">
                    <div class="review-header">
                        <div class="review-avatar" style="background:#0a7a0a;">CP</div>
                        <div>
                            <div class="review-name">Carlos Pérez</div>
                            <div class="review-stars">★★★★☆</div>
                        </div>
                        <div class="review-date">3 Feb 2026</div>
                    </div>
                    <div class="review-title">Muy bueno, pero algo pesado</div>
                    <div class="review-body">
                        En general es un excelente teléfono. La única pega es el peso (195g) que
                        se siente después de un rato usándolo. Todo lo demás es perfecto: velocidad,
                        cámara, pantalla, batería. Vale completamente el precio.
                    </div>
                    <div class="review-verified">
                        <i class="fas fa-check-circle"></i> Compra verificada
                    </div>
                </div>

            </div>
        </div><!-- /detail-tabs -->

    </div><!-- /detail-wrap -->

    <!-- Productos Relacionados -->
    <div class="related-section">
        <h2 class="sec-title">🔗 Productos Relacionados</h2>
        <div class="related-grid">

            <div class="pcard">
                <div class="pcard-img">
                    <img src="https://placehold.co/300x300/f0f2f2/555?text=Funda" alt="Funda">
                </div>
                <div class="pcard-body">
                    <span class="pcard-type">Accesorios</span>
                    <div class="pcard-name">Funda Premium Antigolpes para Smartphone Pro Max</div>
                    <div><span class="pcard-stars">★★★★★</span> <span class="pcard-reviews">(543)</span></div>
                    <div class="pcard-price"><sup>$</sup>19<sub>.99</sub></div>
                    <div class="pcard-del"><i class="fas fa-truck"></i> Envío gratis</div>
                </div>
                <div class="pcard-actions">
                    <button class="btn-cart">Añadir al carrito</button>
                </div>
            </div>

            <div class="pcard">
                <div class="pcard-img">
                    <img src="https://placehold.co/300x300/f0f2f2/555?text=Cargador" alt="Cargador">
                </div>
                <div class="pcard-body">
                    <span class="pcard-type">Electrónica</span>
                    <div class="pcard-name">Cargador Inalámbrico 15W Fast Charge Qi Compatible</div>
                    <div><span class="pcard-stars">★★★★☆</span> <span class="pcard-reviews">(312)</span></div>
                    <div class="pcard-price"><sup>$</sup>29<sub>.99</sub></div>
                    <div class="pcard-del"><i class="fas fa-truck"></i> Envío gratis</div>
                </div>
                <div class="pcard-actions">
                    <button class="btn-cart">Añadir al carrito</button>
                </div>
            </div>

            <div class="pcard">
                <span class="pcard-badge">-20%</span>
                <div class="pcard-img">
                    <img src="https://placehold.co/300x300/f0f2f2/555?text=Auriculares" alt="Auriculares">
                </div>
                <div class="pcard-body">
                    <span class="pcard-type">Audio</span>
                    <div class="pcard-name">Auriculares TWS Bluetooth 5.3 Noise Cancelling</div>
                    <div><span class="pcard-stars">★★★★★</span> <span class="pcard-reviews">(876)</span></div>
                    <div class="pcard-price"><sup>$</sup>59<sub>.99</sub></div>
                    <div class="pcard-old">Antes: $74.99</div>
                    <div class="pcard-del"><i class="fas fa-truck"></i> Envío gratis</div>
                </div>
                <div class="pcard-actions">
                    <button class="btn-cart">Añadir al carrito</button>
                </div>
            </div>

            <div class="pcard">
                <div class="pcard-img">
                    <img src="https://placehold.co/300x300/f0f2f2/555?text=Smartwatch" alt="Smartwatch">
                </div>
                <div class="pcard-body">
                    <span class="pcard-type">Wearables</span>
                    <div class="pcard-name">Smartwatch GPS Deportivo Compatible Android</div>
                    <div><span class="pcard-stars">★★★★☆</span> <span class="pcard-reviews">(421)</span></div>
                    <div class="pcard-price"><sup>$</sup>199<sub>.99</sub></div>
                    <div class="pcard-del"><i class="fas fa-truck"></i> Entrega mañana</div>
                </div>
                <div class="pcard-actions">
                    <button class="btn-cart">Añadir al carrito</button>
                </div>
            </div>

        </div>
    </div>

</main>

<!-- ===================== FOOTER (IGUAL QUE INDEX) ===================== -->
<footer class="site-footer">
    <div class="footer-backtop" onclick="window.scrollTo({top:0,behavior:'smooth'})">
        ↑ &nbsp;Volver al inicio
    </div>

    <div class="footer-grid">

        <div class="footer-brand">
            <div class="brand-name">market<span>Place</span></div>
            <div class="brand-uni">Universidad Autónoma de Bucaramanga</div>
            <p class="brand-desc">
                Proyecto académico desarrollado por estudiantes de Ingeniería de Sistemas
                en el marco del curso de Desarrollo Web. UNAB, Bucaramanga, Colombia.
            </p>
            <div class="brand-info">
                <span><i class="fas fa-map-marker-alt"></i> Calle 48 #39-234, Bucaramanga, Colombia</span>
                <span><i class="fas fa-phone"></i> +57 (7) 643 6111</span>
                <span><i class="fas fa-envelope"></i> <a href="#">webmaster@unab.edu.co</a></span>
                <span><i class="fas fa-globe"></i> <a href="#">www.unab.edu.co</a></span>
            </div>
        </div>

        <div class="footer-col">
            <h5>Conócenos</h5>
            <a href="#">Sobre el proyecto</a>
            <a href="#">Equipo de desarrollo</a>
            <a href="#">UNAB Sistemas</a>
            <a href="#">Repositorio GitHub</a>
            <a href="#">Documentación</a>
        </div>

        <div class="footer-col">
            <h5>Marketplace</h5>
            <a href="#">Ver productos</a>
            <a href="#">Agregar producto</a>
            <a href="#">Categorías</a>
            <a href="#">Ofertas</a>
            <a href="#">Más vendidos</a>
        </div>

        <div class="footer-col">
            <h5>Soporte</h5>
            <a href="#">Centro de ayuda</a>
            <a href="#">Manual de usuario</a>
            <a href="#">Reportar un error</a>
            <a href="#">Contáctanos</a>
            <a href="#">FAQ</a>
        </div>

    </div>

    <hr class="footer-hr">

    <div class="footer-bottom">
        <div class="footer-bottom-links">
            <a href="#">Términos de uso</a>
            <a href="#">Privacidad</a>
            <a href="#">Cookies</a>
            <a href="#">Accesibilidad</a>
        </div>
        <div class="footer-copy">
            © {{ date('Y') }} MarketPlace — Universidad Autónoma de Bucaramanga (UNAB). Proyecto académico.
        </div>
    </div>
</footer>

<script>
// Cambiar imagen principal
function changeImg(thumb, src) {
    document.getElementById('mainImg').src = src;
    document.querySelectorAll('.thumb').forEach(t => t.classList.remove('active'));
    thumb.classList.add('active');
}

// Cantidad
function changeQty(delta) {
    const input = document.getElementById('qty');
    const val = parseInt(input.value) + delta;
    if (val >= 1 && val <= 8) input.value = val;
}

// Tabs
function openTab(e, tabId) {
    document.querySelectorAll('.tab-panel').forEach(p => p.classList.remove('active'));
    document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
    document.getElementById(tabId).classList.add('active');
    e.currentTarget.classList.add('active');
}
</script>

</body>
</html>
