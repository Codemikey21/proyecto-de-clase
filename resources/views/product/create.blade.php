<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MarketPlace — Nuevo Producto</title>
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

<!-- ===================== NAVBAR (IGUAL QUE INDEX) ===================== -->
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
    <div class="create-wrap">

        <!-- Breadcrumb -->
        <div class="breadcrumb">
            <a href="#"><i class="fas fa-home"></i> Inicio</a>
            <span class="sep">›</span>
            <a href="#">Productos</a>
            <span class="sep">›</span>
            <span>Nuevo Producto</span>
        </div>

        <!-- Alertas -->
        @if(session('success'))
        <div style="background:#eaf7ee;border-left:4px solid #007600;padding:12px 16px;border-radius:6px;margin-bottom:16px;font-size:13px;color:#007600;">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
        @endif

        @if($errors->any())
        <div style="background:#fff5f5;border-left:4px solid #CC0C39;padding:12px 16px;border-radius:6px;margin-bottom:16px;font-size:13px;color:#CC0C39;">
            <i class="fas fa-exclamation-circle"></i> <strong>Por favor corrige los siguientes errores:</strong>
            <ul style="margin-top:6px;padding-left:16px;">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- Card del formulario -->
        <div class="form-card">

            <!-- Header de la card -->
            <div class="form-card-hdr">
                <div class="fch-icon">📦</div>
                <div>
                    <h2>Agregar Nuevo Producto</h2>
                    <p>Completa los datos para publicar tu producto en el marketplace</p>
                </div>
            </div>

            <!-- Formulario -->
            <form id="product-form" class="form-body"
                  action="#"
                  method="POST"
                  enctype="multipart/form-data">
                @csrf

                <!-- Fila 1: Tipo + ID -->
                <div class="form-row2">

                    <div class="fg">
                        <label for="tipo_producto">Tipo de Producto <span class="req">*</span></label>
                        <select id="tipo_producto" name="tipo_producto"
                                class="fc @error('tipo_producto') err @enderror" required>
                            <option value="" disabled selected>Selecciona un tipo...</option>
                            <option value="electronica"  @selected(old('tipo_producto')=='electronica')>Electrónica</option>
                            <option value="ropa"         @selected(old('tipo_producto')=='ropa')>Ropa y Moda</option>
                            <option value="hogar"        @selected(old('tipo_producto')=='hogar')>Hogar y Jardín</option>
                            <option value="deportes"     @selected(old('tipo_producto')=='deportes')>Deportes</option>
                            <option value="libros"       @selected(old('tipo_producto')=='libros')>Libros</option>
                            <option value="juguetes"     @selected(old('tipo_producto')=='juguetes')>Juguetes</option>
                            <option value="alimentos"    @selected(old('tipo_producto')=='alimentos')>Alimentos</option>
                            <option value="herramientas" @selected(old('tipo_producto')=='herramientas')>Herramientas</option>
                            <option value="belleza"      @selected(old('tipo_producto')=='belleza')>Belleza y Cuidado</option>
                            <option value="otros"        @selected(old('tipo_producto')=='otros')>Otros</option>
                        </select>
                        @error('tipo_producto')
                        <div class="hint err">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="fg">
                        <label for="id_producto">ID / SKU del Producto <span class="req">*</span></label>
                        <input type="text"
                               id="id_producto"
                               name="id_producto"
                               class="fc @error('id_producto') err @enderror"
                               value="{{ old('id_producto') }}"
                               placeholder="Ej: PROD-001, SKU-1234"
                               maxlength="50"
                               required>
                        <div class="hint">Identificador único (SKU, código interno, etc.)</div>
                        @error('id_producto')
                        <div class="hint err">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <!-- Nombre -->
                <div class="fg">
                    <label for="nombre">Nombre del Producto <span class="req">*</span></label>
                    <input type="text"
                           id="nombre"
                           name="nombre"
                           class="fc @error('nombre') err @enderror"
                           value="{{ old('nombre') }}"
                           placeholder='Ej: Smartphone Pro Max 256GB – Pantalla AMOLED 6.7"'
                           maxlength="200"
                           required>
                    <div class="hint">Sé descriptivo e incluye características clave (máx. 200 caracteres)</div>
                    @error('nombre')
                    <div class="hint err">{{ $message }}</div>
                    @enderror
                </div>

                <hr class="divi">

                <!-- Fila 2: Precio + Imagen -->
                <div class="form-row2">

                    <div class="fg">
                        <label for="precio">Precio <span class="req">*</span></label>
                        <div class="price-wrap">
                            <span class="price-sym">$</span>
                            <input type="number"
                                   id="precio"
                                   name="precio"
                                   class="fc @error('precio') err @enderror"
                                   value="{{ old('precio') }}"
                                   placeholder="0.00"
                                   step="0.01"
                                   min="0"
                                   required>
                        </div>
                        <div class="hint">Precio de venta al público en USD</div>
                        @error('precio')
                        <div class="hint err">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="fg">
                        <label for="imagen">Imagen <span class="opt">(Opcional)</span></label>
                        <div class="upload-zone" id="uploadZone">
                            <input type="file"
                                   id="imagen"
                                   name="imagen"
                                   accept="image/jpeg,image/png,image/webp"
                                   onchange="previewImg(this)">
                            <div class="upload-ico">🖼️</div>
                            <p><strong>Haz clic para subir</strong> o arrastra aquí</p>
                            <small>PNG, JPG, WEBP — Máx. 5MB</small>
                        </div>
                        <div class="img-prev" id="imgPrev">
                            <img id="prevImg" src="" alt="Preview">
                            <div class="ok">✅ Imagen lista para subir</div>
                        </div>
                        @error('imagen')
                        <div class="hint err">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <!-- Descripción -->
                <div class="fg">
                    <label for="descripcion">Descripción <span class="req">*</span></label>
                    <textarea id="descripcion"
                              name="descripcion"
                              class="fc @error('descripcion') err @enderror"
                              rows="5"
                              placeholder="Describe el producto: características, materiales, dimensiones, garantía, contenido del paquete..."
                              required>{{ old('descripcion') }}</textarea>
                    <div class="hint">Una buena descripción aumenta las ventas. Incluye especificaciones técnicas y beneficios.</div>
                    @error('descripcion')
                    <div class="hint err">{{ $message }}</div>
                    @enderror
                </div>

                <hr class="divi">

                <!-- Estado -->
                <div class="fg">
                    <label>Estado del Producto <span class="req">*</span></label>
                    <div class="status-grid">

                        <label class="s-opt">
                            <input type="radio" name="estado" value="activo"
                                   @checked(old('estado','activo')=='activo')>
                            <span class="si">✅</span>
                            <span class="sl">Activo</span>
                            <span class="sd">Visible para compradores</span>
                        </label>

                        <label class="s-opt">
                            <input type="radio" name="estado" value="inactivo"
                                   @checked(old('estado')=='inactivo')>
                            <span class="si">⏸️</span>
                            <span class="sl">Inactivo</span>
                            <span class="sd">Oculto temporalmente</span>
                        </label>

                        <label class="s-opt">
                            <input type="radio" name="estado" value="agotado"
                                   @checked(old('estado')=='agotado')>
                            <span class="si">🔴</span>
                            <span class="sl">Agotado</span>
                            <span class="sd">Sin stock disponible</span>
                        </label>

                        <label class="s-opt">
                            <input type="radio" name="estado" value="borrador"
                                   @checked(old('estado')=='borrador')>
                            <span class="si">📝</span>
                            <span class="sl">Borrador</span>
                            <span class="sd">En preparación</span>
                        </label>

                    </div>
                    @error('estado')
                    <div class="hint err" style="margin-top:6px;">{{ $message }}</div>
                    @enderror
                </div>

            </form>

            <!-- Footer de la card -->
            <div class="form-card-ftr">
                <a href="#" class="btn-cancel">
                    <i class="fas fa-times"></i> Cancelar
                </a>
                <button type="submit" form="product-form" class="btn-submit">
                    <i class="fas fa-upload"></i> Publicar Producto
                </button>
            </div>

        </div><!-- /form-card -->
    </div><!-- /create-wrap -->
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

<script>
// Preview de imagen
function previewImg(input) {
    const prev = document.getElementById('imgPrev');
    const img  = document.getElementById('prevImg');
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = e => {
            img.src = e.target.result;
            prev.style.display = 'block';
        };
        reader.readAsDataURL(input.files[0]);
    }
}

// Drag & drop feedback
const zone = document.getElementById('uploadZone');
zone.addEventListener('dragover', e => {
    e.preventDefault();
    zone.style.borderColor = '#FF9900';
    zone.style.background  = '#fffbf3';
});
zone.addEventListener('dragleave', () => {
    zone.style.borderColor = '';
    zone.style.background  = '';
});
zone.addEventListener('drop', () => {
    zone.style.borderColor = '';
    zone.style.background  = '';
});
</script>

</body>
</html>
