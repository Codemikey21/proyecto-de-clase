@extends('layout.app')
@section('title', 'MarketPlace UNAB — Tecnología')

@section('content')

<section class="hero">
    <div class="hero-bg"></div>
    <div class="hero-grid-lines"></div>
    <div class="hero-eyebrow"><i class="fas fa-bolt"></i> Marketplace Tecnología · UNAB 2026</div>
    <h1>La tienda de la<br><em>comunidad</em></h1>
    <p>Tecnología de primera para estudiantes. Compra, vende y conecta dentro del campus.</p>
    <div class="hero-actions">
        <a href="{{ route('product.create') }}" class="hero-btn"><i class="fas fa-plus"></i> Publicar Producto</a>
        <a href="#productos" class="hero-btn-sec"><i class="fas fa-compass"></i> Explorar</a>
    </div>
    <div class="hero-stats">
        <div class="hero-stat"><strong>+2.4K</strong><span>Productos activos</span></div>
        <div class="hero-stat"><strong>+850</strong><span>Vendedores</span></div>
        <div class="hero-stat"><strong>4.9★</strong><span>Valoración media</span></div>
        <div class="hero-stat"><strong>100%</strong><span>Comunidad UNAB</span></div>
    </div>
</section>

<div class="cats-strip">
    <div class="cats-inner">
        <div class="cat-chip active" onclick="filterCat(this,'')"><span class="ico">🛍️</span> Todos</div>
        <div class="cat-chip" onclick="filterCat(this,'laptop')"><span class="ico">💻</span> Laptops</div>
        <div class="cat-chip" onclick="filterCat(this,'audio')"><span class="ico">🎧</span> Audio</div>
        <div class="cat-chip" onclick="filterCat(this,'smartphone')"><span class="ico">📱</span> Smartphones</div>
        <div class="cat-chip" onclick="filterCat(this,'tablet')"><span class="ico">📟</span> Tablets</div>
        <div class="cat-chip" onclick="filterCat(this,'wearable')"><span class="ico">⌚</span> Wearables</div>
        <div class="cat-chip" onclick="filterCat(this,'accesorio')"><span class="ico">🖱️</span> Accesorios</div>
        <div class="cat-chip" onclick="filterCat(this,'monitor')"><span class="ico">🖥️</span> Monitores</div>
    </div>
</div>

<div class="filters-bar" id="productos">
    <select class="filter-select" onchange="sortProducts(this.value)">
        <option value="">Más relevantes</option>
        <option value="price-asc">Precio: Menor a Mayor</option>
        <option value="price-desc">Precio: Mayor a Menor</option>
        <option value="rating">Mejor valorados</option>
    </select>
    <select class="filter-select">
        <option>Cualquier precio</option>
        <option>$0 – $100</option>
        <option>$100 – $500</option>
        <option>$500 – $1000</option>
        <option>$1000+</option>
    </select>
    <span class="filter-count" id="filter-count">12 productos encontrados</span>
</div>

<div class="products-wrap">

    <div class="promo-banner">
        <div class="promo-text">
            <div class="tag">⚡ Flash Sale · Termina en 2h 34m</div>
            <h3>Hasta 50% en tecnología</h3>
            <p>Laptops, auriculares y accesorios seleccionados por la comunidad UNAB.</p>
        </div>
        <button class="promo-btn">Ver ofertas <i class="fas fa-arrow-right"></i></button>
    </div>

    {{-- PRODUCTOS REALES DE LA BASE DE DATOS --}}
    @if($misProductos->count() > 0)
    <div class="p-section">
        <div class="p-section-hdr">
            <h2>📦 Productos Publicados</h2>
            <a href="{{ route('product.create') }}">+ Publicar nuevo <i class="fas fa-arrow-right" style="font-size:10px"></i></a>
        </div>
        <div class="products-grid">
            @foreach($misProductos as $producto)
            <div class="pcard" data-cat="{{ strtolower($producto->category->name ?? '') }}" data-price="{{ $producto->price }}" data-rating="5">
                <div class="pcard-wish" onclick="toggleWish(this)">♡</div>
                <div class="pcard-img">
                    @if($producto->image)
                        <img src="{{ asset('storage/' . $producto->image) }}" alt="{{ $producto->name }}"
                             onerror="this.src='https://placehold.co/300x300/141414/00ff87?text={{ urlencode(substr($producto->name,0,10)) }}'">
                    @else
                        <img src="https://placehold.co/300x300/141414/00ff87?text={{ urlencode(substr($producto->name,0,10)) }}" alt="{{ $producto->name }}">
                    @endif
                </div>
                <div class="pcard-body">
                    <span class="pcard-type">{{ $producto->category->name ?? 'Sin categoría' }}</span>
                    <div class="pcard-name">{{ $producto->name }}</div>
                    <div><span class="pcard-stars">★★★★★</span></div>
                    <div class="pcard-price"><sup>$</sup>{{ number_format($producto->price, 2) }}</div>
                    <div class="pcard-del"><i class="fas fa-truck"></i> Entrega disponible</div>
                </div>
                <div class="pcard-actions">
                    <button class="btn-cart" onclick="addToCart('{{ addslashes($producto->name) }}', {{ $producto->price }}, '{{ $producto->image ? asset('storage/'.$producto->image) : 'https://placehold.co/300x300/141414/00ff87?text=Producto' }}')">
                        🛒 Añadir
                    </button>
                    <a href="{{ route('product.show', $producto->id) }}" class="btn-buy" style="display:flex;align-items:center;justify-content:center;text-decoration:none;">
                        Ver más
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif

    {{-- SECCIÓN 1: MÁS VENDIDOS (fijos) --}}
    <div class="p-section">
        <div class="p-section-hdr">
            <h2>🔥 Más Vendidos</h2>
            <a href="#">Ver todos <i class="fas fa-arrow-right" style="font-size:10px"></i></a>
        </div>
        <div class="products-grid">

            <div class="pcard" data-cat="laptop" data-price="999" data-rating="5">
                <span class="pcard-badge new">NUEVO</span>
                <div class="pcard-wish" onclick="toggleWish(this)">♡</div>
                <div class="pcard-img">
                    <img src="https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/macbook-air-midnight-select-20220606?wid=452&hei=420&fmt=jpeg&qlt=95&.v=1653084303665" alt="MacBook Air M2" onerror="this.src='https://placehold.co/300x300/141414/00ff87?text=MacBook'">
                </div>
                <div class="pcard-body">
                    <span class="pcard-type">Laptop</span>
                    <div class="pcard-name">Apple MacBook Air M2 13" – 8GB RAM 256GB SSD</div>
                    <div><span class="pcard-stars">★★★★★</span> <span class="pcard-reviews">(4,201)</span></div>
                    <div class="pcard-price"><sup>$</sup>999<sub>.00</sub></div>
                    <div class="pcard-del"><i class="fas fa-truck"></i> Entrega mañana — Gratis</div>
                </div>
                <div class="pcard-actions">
                    <button class="btn-cart" onclick="addToCart('MacBook Air M2',999,'https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/macbook-air-midnight-select-20220606?wid=452&hei=420&fmt=jpeg&qlt=95&.v=1653084303665')">🛒 Añadir</button>
                    <button class="btn-buy">Ver más</button>
                </div>
            </div>

            <div class="pcard" data-cat="audio" data-price="249" data-rating="5">
                <span class="pcard-badge">-15%</span>
                <div class="pcard-wish" onclick="toggleWish(this)">♡</div>
                <div class="pcard-img">
                    <img src="https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/MQD83?wid=532&hei=582&fmt=jpeg&qlt=95&.v=1660803972361" alt="AirPods Pro" onerror="this.src='https://placehold.co/300x300/141414/00ff87?text=AirPods'">
                </div>
                <div class="pcard-body">
                    <span class="pcard-type">Audio</span>
                    <div class="pcard-name">Apple AirPods Pro 2da Gen – Noise Cancelling USB-C</div>
                    <div><span class="pcard-stars">★★★★★</span> <span class="pcard-reviews">(8,432)</span></div>
                    <div class="pcard-price"><sup>$</sup>249<sub>.00</sub></div>
                    <div class="pcard-old">Antes: $289.00</div>
                    <div class="pcard-disc">Ahorras $40 (15%)</div>
                    <div class="pcard-del"><i class="fas fa-truck"></i> Entrega en 2 días — Gratis</div>
                </div>
                <div class="pcard-actions">
                    <button class="btn-cart" onclick="addToCart('AirPods Pro 2',249,'https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/MQD83?wid=532&hei=582&fmt=jpeg&qlt=95&.v=1660803972361')">🛒 Añadir</button>
                    <button class="btn-buy">Ver más</button>
                </div>
            </div>

            <div class="pcard" data-cat="smartphone" data-price="799" data-rating="5">
                <span class="pcard-badge">-20%</span>
                <div class="pcard-wish" onclick="toggleWish(this)">♡</div>
                <div class="pcard-img">
                    <img src="https://images.samsung.com/is/image/samsung/p6pim/levant/2401/gallery/levant-galaxy-s24-s921-sm-s921bzkdmea-539340459?$650_519_PNG$" alt="Samsung Galaxy S24" onerror="this.src='https://placehold.co/300x300/141414/00ff87?text=Galaxy+S24'">
                </div>
                <div class="pcard-body">
                    <span class="pcard-type">Smartphone</span>
                    <div class="pcard-name">Samsung Galaxy S24 256GB – IA, 50MP, 6.2" AMOLED</div>
                    <div><span class="pcard-stars">★★★★★</span> <span class="pcard-reviews">(3,187)</span></div>
                    <div class="pcard-price"><sup>$</sup>799<sub>.99</sub></div>
                    <div class="pcard-old">Antes: $999.99</div>
                    <div class="pcard-disc">Ahorras $200 (20%)</div>
                    <div class="pcard-del"><i class="fas fa-truck"></i> Entrega mañana — Gratis</div>
                </div>
                <div class="pcard-actions">
                    <button class="btn-cart" onclick="addToCart('Samsung Galaxy S24',799,'https://images.samsung.com/is/image/samsung/p6pim/levant/2401/gallery/levant-galaxy-s24-s921-sm-s921bzkdmea-539340459?$650_519_PNG$')">🛒 Añadir</button>
                    <button class="btn-buy">Ver más</button>
                </div>
            </div>

            <div class="pcard" data-cat="tablet" data-price="599" data-rating="5">
                <div class="pcard-wish" onclick="toggleWish(this)">♡</div>
                <div class="pcard-img">
                    <img src="https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/ipad-air-select-wifi-blue-202203?wid=470&hei=556&fmt=jpeg&qlt=95&.v=1645065732688" alt="iPad Air" onerror="this.src='https://placehold.co/300x300/141414/00ff87?text=iPad+Air'">
                </div>
                <div class="pcard-body">
                    <span class="pcard-type">Tablet</span>
                    <div class="pcard-name">Apple iPad Air 5ta Gen 10.9" – M1 64GB WiFi</div>
                    <div><span class="pcard-stars">★★★★★</span> <span class="pcard-reviews">(2,654)</span></div>
                    <div class="pcard-price"><sup>$</sup>599<sub>.00</sub></div>
                    <div class="pcard-del"><i class="fas fa-truck"></i> Entrega mañana — Gratis</div>
                </div>
                <div class="pcard-actions">
                    <button class="btn-cart" onclick="addToCart('iPad Air M1',599,'https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/ipad-air-select-wifi-blue-202203?wid=470&hei=556&fmt=jpeg&qlt=95&.v=1645065732688')">🛒 Añadir</button>
                    <button class="btn-buy">Ver más</button>
                </div>
            </div>

            <div class="pcard" data-cat="audio" data-price="279" data-rating="5">
                <span class="pcard-badge">-30%</span>
                <div class="pcard-wish" onclick="toggleWish(this)">♡</div>
                <div class="pcard-img">
                    <img src="https://www.sony.com/image/5d02da5df552836db894cead8a68f5f3?fmt=png-alpha&wid=440" alt="Sony WH-1000XM5" onerror="this.src='https://placehold.co/300x300/141414/00ff87?text=Sony+XM5'">
                </div>
                <div class="pcard-body">
                    <span class="pcard-type">Audio</span>
                    <div class="pcard-name">Sony WH-1000XM5 – Noise Cancelling 30h Bluetooth</div>
                    <div><span class="pcard-stars">★★★★★</span> <span class="pcard-reviews">(5,921)</span></div>
                    <div class="pcard-price"><sup>$</sup>279<sub>.00</sub></div>
                    <div class="pcard-old">Antes: $399.00</div>
                    <div class="pcard-disc">Ahorras $120 (30%)</div>
                    <div class="pcard-del"><i class="fas fa-truck"></i> Entrega en 2 días — Gratis</div>
                </div>
                <div class="pcard-actions">
                    <button class="btn-cart" onclick="addToCart('Sony WH-1000XM5',279,'https://www.sony.com/image/5d02da5df552836db894cead8a68f5f3?fmt=png-alpha&wid=440')">🛒 Añadir</button>
                    <button class="btn-buy">Ver más</button>
                </div>
            </div>

            <div class="pcard" data-cat="wearable" data-price="399" data-rating="4">
                <span class="pcard-badge new">NUEVO</span>
                <div class="pcard-wish" onclick="toggleWish(this)">♡</div>
                <div class="pcard-img">
                    <img src="https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/MQDY3ref_VW_34FR+watch-45-alum-midnight-nc-9s_VW_34FR_WF_CO+watch-face-45-nike-volt-splash-9s_VW_34FR?wid=750&hei=712&trim=1&fmt=p-jpg&qlt=95&.v=1693329384603" alt="Apple Watch S9" onerror="this.src='https://placehold.co/300x300/141414/00ff87?text=Apple+Watch'">
                </div>
                <div class="pcard-body">
                    <span class="pcard-type">Wearable</span>
                    <div class="pcard-name">Apple Watch Series 9 – GPS 45mm Aluminium Sport</div>
                    <div><span class="pcard-stars">★★★★☆</span> <span class="pcard-reviews">(1,843)</span></div>
                    <div class="pcard-price"><sup>$</sup>399<sub>.00</sub></div>
                    <div class="pcard-del"><i class="fas fa-truck"></i> Entrega mañana — Gratis</div>
                </div>
                <div class="pcard-actions">
                    <button class="btn-cart" onclick="addToCart('Apple Watch S9',399,'https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/MQDY3ref_VW_34FR+watch-45-alum-midnight-nc-9s_VW_34FR_WF_CO+watch-face-45-nike-volt-splash-9s_VW_34FR?wid=750&hei=712&trim=1&fmt=p-jpg&qlt=95&.v=1693329384603')">🛒 Añadir</button>
                    <button class="btn-buy">Ver más</button>
                </div>
            </div>

        </div>
    </div>

    {{-- SECCIÓN 2: OFERTAS --}}
    <div class="p-section">
        <div class="p-section-hdr">
            <h2>⚡ Ofertas del Día</h2>
            <a href="#">Ver todas <i class="fas fa-arrow-right" style="font-size:10px"></i></a>
        </div>
        <div class="products-grid">

            <div class="pcard" data-cat="laptop" data-price="849" data-rating="4">
                <span class="pcard-badge">-25%</span>
                <div class="pcard-wish" onclick="toggleWish(this)">♡</div>
                <div class="pcard-img">
                    <img src="https://i.dell.com/is/image/DellContent/content/dam/ss2/product-images/dell-client-products/notebooks/xps-notebooks/xps-13-9315/media-gallery/black/notebook-xps-13-9315-t-black-gallery-4.psd?fmt=png-alpha&pscan=auto&scl=1&hei=402&wid=402&qlt=100,1&resMode=sharp2&size=402,402&chrss=full" alt="Dell XPS 13" onerror="this.src='https://placehold.co/300x300/141414/00ff87?text=Dell+XPS'">
                </div>
                <div class="pcard-body">
                    <span class="pcard-type">Laptop</span>
                    <div class="pcard-name">Dell XPS 13 Plus – Intel i7 16GB 512GB SSD OLED</div>
                    <div><span class="pcard-stars">★★★★☆</span> <span class="pcard-reviews">(2,103)</span></div>
                    <div class="pcard-price"><sup>$</sup>849<sub>.00</sub></div>
                    <div class="pcard-old">Antes: $1,129.00</div>
                    <div class="pcard-disc">Ahorras $280 (25%)</div>
                    <div class="pcard-del"><i class="fas fa-truck"></i> Entrega en 3 días</div>
                </div>
                <div class="pcard-actions">
                    <button class="btn-cart" onclick="addToCart('Dell XPS 13',849,'https://placehold.co/300x300/141414/00ff87?text=Dell+XPS')">🛒 Añadir</button>
                    <button class="btn-buy">Ver más</button>
                </div>
            </div>

            <div class="pcard" data-cat="tablet" data-price="649" data-rating="5">
                <span class="pcard-badge">-18%</span>
                <div class="pcard-wish" onclick="toggleWish(this)">♡</div>
                <div class="pcard-img">
                    <img src="https://images.samsung.com/is/image/samsung/p6pim/levant/2307/gallery/levant-galaxy-tab-s9-wifi-sm-x710nzaamea-thumb-537246798?$650_519_PNG$" alt="Samsung Tab S9" onerror="this.src='https://placehold.co/300x300/141414/00ff87?text=Tab+S9'">
                </div>
                <div class="pcard-body">
                    <span class="pcard-type">Tablet</span>
                    <div class="pcard-name">Samsung Galaxy Tab S9 – Snapdragon 8 11" 128GB</div>
                    <div><span class="pcard-stars">★★★★★</span> <span class="pcard-reviews">(1,567)</span></div>
                    <div class="pcard-price"><sup>$</sup>649<sub>.00</sub></div>
                    <div class="pcard-old">Antes: $799.00</div>
                    <div class="pcard-disc">Ahorras $150 (18%)</div>
                    <div class="pcard-del"><i class="fas fa-truck"></i> Entrega en 2 días</div>
                </div>
                <div class="pcard-actions">
                    <button class="btn-cart" onclick="addToCart('Samsung Tab S9',649,'https://images.samsung.com/is/image/samsung/p6pim/levant/2307/gallery/levant-galaxy-tab-s9-wifi-sm-x710nzaamea-thumb-537246798?$650_519_PNG$')">🛒 Añadir</button>
                    <button class="btn-buy">Ver más</button>
                </div>
            </div>

            <div class="pcard" data-cat="accesorio" data-price="79" data-rating="5">
                <div class="pcard-wish" onclick="toggleWish(this)">♡</div>
                <div class="pcard-img">
                    <img src="https://resource.logitech.com/w_692,c_lpad,ar_4:3,q_auto,f_auto,dpr_1.0/d_transparent.gif/content/dam/logitech/en/products/mice/mx-master-3s/gallery/mx-master-3s-mouse-top-view-graphite.png" alt="Logitech MX Master 3S" onerror="this.src='https://placehold.co/300x300/141414/00ff87?text=MX+Master'">
                </div>
                <div class="pcard-body">
                    <span class="pcard-type">Accesorio</span>
                    <div class="pcard-name">Logitech MX Master 3S – Mouse Inalámbrico 8K DPI</div>
                    <div><span class="pcard-stars">★★★★★</span> <span class="pcard-reviews">(3,412)</span></div>
                    <div class="pcard-price"><sup>$</sup>79<sub>.99</sub></div>
                    <div class="pcard-del"><i class="fas fa-truck"></i> Entrega en 2 días — Gratis</div>
                </div>
                <div class="pcard-actions">
                    <button class="btn-cart" onclick="addToCart('Logitech MX Master 3S',79.99,'https://placehold.co/300x300/141414/00ff87?text=MX+Master')">🛒 Añadir</button>
                    <button class="btn-buy">Ver más</button>
                </div>
            </div>

            <div class="pcard" data-cat="monitor" data-price="349" data-rating="4">
                <span class="pcard-badge top">TOP</span>
                <div class="pcard-wish" onclick="toggleWish(this)">♡</div>
                <div class="pcard-img">
                    <img src="https://www.lg.com/us/images/monitors/md07553635/gallery/medium01.jpg" alt="Monitor LG" onerror="this.src='https://placehold.co/300x300/141414/00ff87?text=LG+Monitor'">
                </div>
                <div class="pcard-body">
                    <span class="pcard-type">Monitor</span>
                    <div class="pcard-name">LG UltraWide 29" – 2560x1080 IPS 75Hz AMD FreeSync</div>
                    <div><span class="pcard-stars">★★★★☆</span> <span class="pcard-reviews">(987)</span></div>
                    <div class="pcard-price"><sup>$</sup>349<sub>.00</sub></div>
                    <div class="pcard-del"><i class="fas fa-truck"></i> Entrega en 4 días — Gratis</div>
                </div>
                <div class="pcard-actions">
                    <button class="btn-cart" onclick="addToCart('LG UltraWide 29&quot;',349,'https://placehold.co/300x300/141414/00ff87?text=LG+Monitor')">🛒 Añadir</button>
                    <button class="btn-buy">Ver más</button>
                </div>
            </div>

            <div class="pcard" data-cat="audio" data-price="129" data-rating="4">
                <span class="pcard-badge">-22%</span>
                <div class="pcard-wish" onclick="toggleWish(this)">♡</div>
                <div class="pcard-img">
                    <img src="https://www.jbl.com/dw/image/v2/AAUJ_PRD/on/demandware.static/-/Sites-masterCatalog_Harman/default/dw3b69f99e/JBL_CHARGE5_HERO_BLK_01_x2.png?sw=537&sh=522" alt="JBL Charge 5" onerror="this.src='https://placehold.co/300x300/141414/00ff87?text=JBL+Charge'">
                </div>
                <div class="pcard-body">
                    <span class="pcard-type">Audio</span>
                    <div class="pcard-name">JBL Charge 5 – Altavoz Bluetooth 20h Waterproof IP67</div>
                    <div><span class="pcard-stars">★★★★☆</span> <span class="pcard-reviews">(2,234)</span></div>
                    <div class="pcard-price"><sup>$</sup>129<sub>.00</sub></div>
                    <div class="pcard-old">Antes: $169.00</div>
                    <div class="pcard-disc">Ahorras $40 (22%)</div>
                    <div class="pcard-del"><i class="fas fa-truck"></i> Entrega en 2 días</div>
                </div>
                <div class="pcard-actions">
                    <button class="btn-cart" onclick="addToCart('JBL Charge 5',129,'https://placehold.co/300x300/141414/00ff87?text=JBL+Charge')">🛒 Añadir</button>
                    <button class="btn-buy">Ver más</button>
                </div>
            </div>

            <div class="pcard" data-cat="wearable" data-price="199" data-rating="4">
                <div class="pcard-wish" onclick="toggleWish(this)">♡</div>
                <div class="pcard-img">
                    <img src="https://images.samsung.com/is/image/samsung/p6pim/levant/2307/gallery/levant-galaxy-watch6-40mm-sm-r930nzkamea-thumb-537257797?$650_519_PNG$" alt="Galaxy Watch 6" onerror="this.src='https://placehold.co/300x300/141414/00ff87?text=Watch+6'">
                </div>
                <div class="pcard-body">
                    <span class="pcard-type">Wearable</span>
                    <div class="pcard-name">Samsung Galaxy Watch 6 – 40mm GPS Monitor Salud</div>
                    <div><span class="pcard-stars">★★★★☆</span> <span class="pcard-reviews">(1,102)</span></div>
                    <div class="pcard-price"><sup>$</sup>199<sub>.00</sub></div>
                    <div class="pcard-del"><i class="fas fa-truck"></i> Entrega mañana — Gratis</div>
                </div>
                <div class="pcard-actions">
                    <button class="btn-cart" onclick="addToCart('Samsung Galaxy Watch 6',199,'https://images.samsung.com/is/image/samsung/p6pim/levant/2307/gallery/levant-galaxy-watch6-40mm-sm-r930nzkamea-thumb-537257797?$650_519_PNG$')">🛒 Añadir</button>
                    <button class="btn-buy">Ver más</button>
                </div>
            </div>

        </div>
    </div>

</div>
@endsection

@push('scripts')
<script>
function toggleWish(el) {
    el.classList.toggle('active');
    el.textContent = el.classList.contains('active') ? '♥' : '♡';
    el.style.color = el.classList.contains('active') ? 'var(--accent)' : '';
}

function filterCat(chip, cat) {
    document.querySelectorAll('.cat-chip').forEach(c => c.classList.remove('active'));
    chip.classList.add('active');
    const cards = document.querySelectorAll('.pcard');
    let visible = 0;
    cards.forEach(card => {
        const match = !cat || card.dataset.cat === cat;
        card.style.display = match ? '' : 'none';
        if (match) visible++;
    });
    document.getElementById('filter-count').textContent = visible + ' productos encontrados';
}

function sortProducts(criteria) {
    document.querySelectorAll('.products-grid').forEach(grid => {
        const cards = [...grid.querySelectorAll('.pcard')];
        cards.sort((a, b) => {
            if (criteria === 'price-asc') return parseFloat(a.dataset.price) - parseFloat(b.dataset.price);
            if (criteria === 'price-desc') return parseFloat(b.dataset.price) - parseFloat(a.dataset.price);
            if (criteria === 'rating') return parseFloat(b.dataset.rating) - parseFloat(a.dataset.rating);
            return 0;
        });
        cards.forEach(c => grid.appendChild(c));
    });
}

const observer = new IntersectionObserver(entries => {
    entries.forEach(e => {
        if (e.isIntersecting) {
            e.target.style.opacity = '1';
            e.target.style.transform = 'translateY(0)';
        }
    });
}, { threshold: 0.06 });

document.querySelectorAll('.pcard').forEach((card, i) => {
    card.style.opacity = '0';
    card.style.transform = 'translateY(20px)';
    card.style.transition = `opacity .4s ease ${i * 0.05}s, transform .4s ease ${i * 0.05}s, border-color .3s, box-shadow .3s`;
    observer.observe(card);
});
</script>
@endpush
