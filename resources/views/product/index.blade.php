<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MarketPlace — Productos</title>
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
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
            <input type="text" placeholder="Buscar productos, marcas y más..." value="{{ request('q') }}">
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

    <!-- Hero -->
    <div class="hero">
        <h1>🛒 Bienvenido a MarketPlace</h1>
        <p>Descubre miles de productos al mejor precio con envío rápido</p>
        <a href="#" class="hero-btn">
            <i class="fas fa-plus"></i> Agregar Producto
        </a>
    </div>

    <!-- Filtros -->
    <div class="filters-row">
        <label>Ordenar por:</label>
        <select>
            <option>Más relevantes</option>
            <option>Precio: Menor a Mayor</option>
            <option>Precio: Mayor a Menor</option>
            <option>Mejor valorados</option>
            <option>Más nuevos</option>
        </select>
        <select>
            <option>Todas las categorías</option>
            <option>Electrónica</option>
            <option>Ropa y Moda</option>
            <option>Hogar y Jardín</option>
            <option>Deportes</option>
            <option>Libros</option>
        </select>
        <select>
            <option>Cualquier precio</option>
            <option>$0 – $50</option>
            <option>$50 – $100</option>
            <option>$100 – $300</option>
            <option>$300+</option>
        </select>
        <span class="count">12 productos encontrados</span>
    </div>

    <!-- Grid de productos -->
    <div class="products-section">
        <h2 class="sec-title">🔥 Productos Destacados</h2>
        <div class="products-grid">

            <!-- Producto 1 -->
            <div class="pcard">
                <span class="pcard-badge">-35%</span>
                <div class="pcard-img">
                    <img src="https://placehold.co/300x300/f0f2f2/555?text=Smartphone" alt="Smartphone">
                </div>
                <div class="pcard-body">
                    <span class="pcard-type">Electrónica</span>
                    <div class="pcard-name">Smartphone Pro Max 256GB – Pantalla AMOLED 6.7" Batería 5000mAh</div>
                    <div><span class="pcard-stars">★★★★★</span> <span class="pcard-reviews">(2,847)</span></div>
                    <div class="pcard-price"><sup>$</sup>649<sub>.99</sub></div>
                    <div class="pcard-old">Antes: $999.99</div>
                    <div class="pcard-disc">Ahorras $350.00 (35%)</div>
                    <div class="pcard-del"><i class="fas fa-truck"></i> Entrega mañana — Gratis</div>
                </div>
                <div class="pcard-actions">
                    <button class="btn-cart">Añadir al carrito</button>
                    <button class="btn-buy">Comprar ahora</button>
                </div>
            </div>

            <!-- Producto 2 -->
            <div class="pcard">
                <span class="pcard-badge">OFERTA</span>
                <div class="pcard-img">
                    <img src="https://placehold.co/300x300/f0f2f2/555?text=Auriculares" alt="Auriculares">
                </div>
                <div class="pcard-body">
                    <span class="pcard-type">Audio</span>
                    <div class="pcard-name">Auriculares Inalámbricos Noise Cancelling – 40h Batería Bluetooth 5.3</div>
                    <div><span class="pcard-stars">★★★★☆</span> <span class="pcard-reviews">(1,523)</span></div>
                    <div class="pcard-price"><sup>$</sup>89<sub>.99</sub></div>
                    <div class="pcard-old">Antes: $149.99</div>
                    <div class="pcard-disc">Ahorras $60.00 (40%)</div>
                    <div class="pcard-del"><i class="fas fa-truck"></i> Entrega en 2 días — Gratis</div>
                </div>
                <div class="pcard-actions">
                    <button class="btn-cart">Añadir al carrito</button>
                    <button class="btn-buy">Comprar ahora</button>
                </div>
            </div>

            <!-- Producto 3 -->
            <div class="pcard">
                <div class="pcard-img">
                    <img src="https://placehold.co/300x300/f0f2f2/555?text=Laptop" alt="Laptop">
                </div>
                <div class="pcard-body">
                    <span class="pcard-type">Computación</span>
                    <div class="pcard-name">Laptop Ultra Slim 15" Intel i7 16GB RAM 512GB SSD Windows 11</div>
                    <div><span class="pcard-stars">★★★★★</span> <span class="pcard-reviews">(4,102)</span></div>
                    <div class="pcard-price"><sup>$</sup>1,199<sub>.00</sub></div>
                    <div class="pcard-del"><i class="fas fa-truck"></i> Entrega mañana — Gratis</div>
                </div>
                <div class="pcard-actions">
                    <button class="btn-cart">Añadir al carrito</button>
                    <button class="btn-buy">Comprar ahora</button>
                </div>
            </div>

            <!-- Producto 4 -->
            <div class="pcard">
                <span class="pcard-badge">-20%</span>
                <div class="pcard-img">
                    <img src="https://placehold.co/300x300/f0f2f2/555?text=Zapatillas" alt="Zapatillas">
                </div>
                <div class="pcard-body">
                    <span class="pcard-type">Deportes</span>
                    <div class="pcard-name">Zapatillas Running Pro – Suela Amortiguadora Tallas 36-46</div>
                    <div><span class="pcard-stars">★★★★☆</span> <span class="pcard-reviews">(876)</span></div>
                    <div class="pcard-price"><sup>$</sup>79<sub>.99</sub></div>
                    <div class="pcard-old">Antes: $99.99</div>
                    <div class="pcard-disc">Ahorras $20.00 (20%)</div>
                    <div class="pcard-del"><i class="fas fa-truck"></i> Entrega en 3 días — $5.99</div>
                </div>
                <div class="pcard-actions">
                    <button class="btn-cart">Añadir al carrito</button>
                    <button class="btn-buy">Comprar ahora</button>
                </div>
            </div>

            <!-- Producto 5 -->
            <div class="pcard">
                <div class="pcard-img">
                    <img src="https://placehold.co/300x300/f0f2f2/555?text=Silla" alt="Silla Ergonómica">
                </div>
                <div class="pcard-body">
                    <span class="pcard-type">Hogar</span>
                    <div class="pcard-name">Silla Ergonómica de Oficina – Lumbar Ajustable Respaldo Mesh</div>
                    <div><span class="pcard-stars">★★★★★</span> <span class="pcard-reviews">(3,241)</span></div>
                    <div class="pcard-price"><sup>$</sup>249<sub>.00</sub></div>
                    <div class="pcard-del"><i class="fas fa-truck"></i> Entrega en 5 días — Gratis</div>
                </div>
                <div class="pcard-actions">
                    <button class="btn-cart">Añadir al carrito</button>
                    <button class="btn-buy">Comprar ahora</button>
                </div>
            </div>

            <!-- Producto 6 -->
            <div class="pcard">
                <span class="pcard-badge new">NUEVO</span>
                <div class="pcard-img">
                    <img src="https://placehold.co/300x300/f0f2f2/555?text=Smartwatch" alt="Smartwatch">
                </div>
                <div class="pcard-body">
                    <span class="pcard-type">Wearables</span>
                    <div class="pcard-name">Smartwatch GPS Deportivo – Monitor Cardíaco SpO2 Resistente al Agua</div>
                    <div><span class="pcard-stars">★★★★☆</span> <span class="pcard-reviews">(654)</span></div>
                    <div class="pcard-price"><sup>$</sup>199<sub>.99</sub></div>
                    <div class="pcard-del"><i class="fas fa-truck"></i> Entrega mañana — Gratis</div>
                </div>
                <div class="pcard-actions">
                    <button class="btn-cart">Añadir al carrito</button>
                    <button class="btn-buy">Comprar ahora</button>
                </div>
            </div>

            <!-- Producto 7 -->
            <div class="pcard">
                <span class="pcard-badge">-50%</span>
                <div class="pcard-img">
                    <img src="https://placehold.co/300x300/f0f2f2/555?text=Camara" alt="Cámara">
                </div>
                <div class="pcard-body">
                    <span class="pcard-type">Fotografía</span>
                    <div class="pcard-name">Cámara Digital 4K 48MP – WiFi Bluetooth Zoom Óptico 30x</div>
                    <div><span class="pcard-stars">★★★★★</span> <span class="pcard-reviews">(1,987)</span></div>
                    <div class="pcard-price"><sup>$</sup>374<sub>.99</sub></div>
                    <div class="pcard-old">Antes: $749.99</div>
                    <div class="pcard-disc">Ahorras $375.00 (50%)</div>
                    <div class="pcard-del"><i class="fas fa-truck"></i> Entrega en 2 días — Gratis</div>
                </div>
                <div class="pcard-actions">
                    <button class="btn-cart">Añadir al carrito</button>
                    <button class="btn-buy">Comprar ahora</button>
                </div>
            </div>

            <!-- Producto 8 -->
            <div class="pcard">
                <div class="pcard-img">
                    <img src="https://placehold.co/300x300/f0f2f2/555?text=Tablet" alt="Tablet">
                </div>
                <div class="pcard-body">
                    <span class="pcard-type">Tablets</span>
                    <div class="pcard-name">Tablet 10.5" 128GB WiFi – Pantalla IPS Batería 8000mAh Android 13</div>
                    <div><span class="pcard-stars">★★★★☆</span> <span class="pcard-reviews">(2,310)</span></div>
                    <div class="pcard-price"><sup>$</sup>329<sub>.99</sub></div>
                    <div class="pcard-del"><i class="fas fa-truck"></i> Entrega mañana — Gratis</div>
                </div>
                <div class="pcard-actions">
                    <button class="btn-cart">Añadir al carrito</button>
                    <button class="btn-buy">Comprar ahora</button>
                </div>
            </div>

            <!-- Producto 9 -->
            <div class="pcard">
                <span class="pcard-badge">-15%</span>
                <div class="pcard-img">
                    <img src="https://placehold.co/300x300/f0f2f2/555?text=Licuadora" alt="Licuadora">
                </div>
                <div class="pcard-body">
                    <span class="pcard-type">Cocina</span>
                    <div class="pcard-name">Licuadora de Alta Potencia 1500W 2L – 8 Velocidades Inox</div>
                    <div><span class="pcard-stars">★★★★★</span> <span class="pcard-reviews">(789)</span></div>
                    <div class="pcard-price"><sup>$</sup>84<sub>.99</sub></div>
                    <div class="pcard-old">Antes: $99.99</div>
                    <div class="pcard-del"><i class="fas fa-truck"></i> Entrega en 3 días — Gratis</div>
                </div>
                <div class="pcard-actions">
                    <button class="btn-cart">Añadir al carrito</button>
                    <button class="btn-buy">Comprar ahora</button>
                </div>
            </div>

            <!-- Producto 10 -->
            <div class="pcard">
                <div class="pcard-img">
                    <img src="https://placehold.co/300x300/f0f2f2/555?text=Mochila" alt="Mochila">
                </div>
                <div class="pcard-body">
                    <span class="pcard-type">Accesorios</span>
                    <div class="pcard-name">Mochila Antirrobo 40L USB Carga – Impermeable Viaje/Trabajo</div>
                    <div><span class="pcard-stars">★★★★☆</span> <span class="pcard-reviews">(1,120)</span></div>
                    <div class="pcard-price"><sup>$</sup>54<sub>.99</sub></div>
                    <div class="pcard-del"><i class="fas fa-truck"></i> Entrega en 2 días — Gratis</div>
                </div>
                <div class="pcard-actions">
                    <button class="btn-cart">Añadir al carrito</button>
                    <button class="btn-buy">Comprar ahora</button>
                </div>
            </div>

            <!-- Producto 11 -->
            <div class="pcard">
                <span class="pcard-badge top">TOP</span>
                <div class="pcard-img">
                    <img src="https://placehold.co/300x300/f0f2f2/555?text=Monitor" alt="Monitor">
                </div>
                <div class="pcard-body">
                    <span class="pcard-type">Monitores</span>
                    <div class="pcard-name">Monitor Gaming 27" 165Hz QHD 1ms – IPS HDR FreeSync Premium</div>
                    <div><span class="pcard-stars">★★★★★</span> <span class="pcard-reviews">(3,867)</span></div>
                    <div class="pcard-price"><sup>$</sup>399<sub>.00</sub></div>
                    <div class="pcard-del"><i class="fas fa-truck"></i> Entrega mañana — Gratis</div>
                </div>
                <div class="pcard-actions">
                    <button class="btn-cart">Añadir al carrito</button>
                    <button class="btn-buy">Comprar ahora</button>
                </div>
            </div>

            <!-- Producto 12 -->
            <div class="pcard">
                <span class="pcard-badge">-25%</span>
                <div class="pcard-img">
                    <img src="https://placehold.co/300x300/f0f2f2/555?text=Libros" alt="Libros">
                </div>
                <div class="pcard-body">
                    <span class="pcard-type">Libros</span>
                    <div class="pcard-name">Pack 5 Libros Programación – Python, JS, Laravel, SQL, DevOps</div>
                    <div><span class="pcard-stars">★★★★★</span> <span class="pcard-reviews">(445)</span></div>
                    <div class="pcard-price"><sup>$</sup>59<sub>.99</sub></div>
                    <div class="pcard-old">Antes: $79.99</div>
                    <div class="pcard-disc">Ahorras $20.00 (25%)</div>
                    <div class="pcard-del"><i class="fas fa-truck"></i> Entrega en 4 días — $3.99</div>
                </div>
                <div class="pcard-actions">
                    <button class="btn-cart">Añadir al carrito</button>
                    <button class="btn-buy">Comprar ahora</button>
                </div>
            </div>

        </div><!-- /products-grid -->
    </div><!-- /products-section -->

</main>

<!-- ===================== FOOTER ===================== -->
<footer class="site-footer">
    <div class="footer-backtop" onclick="window.scrollTo({top:0,behavior:'smooth'})">
        ↑ &nbsp;Volver al inicio
    </div>

    <div class="footer-grid">

        <!-- Marca UNAB -->
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
                <span><i class="fas fa-envelope"></i> <a href="mailto:webmaster@unab.edu.co">webmaster@unab.edu.co</a></span>
                <span><i class="fas fa-globe"></i> <a href="https://www.unab.edu.co" target="_blank">www.unab.edu.co</a></span>
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

</body>
</html>
