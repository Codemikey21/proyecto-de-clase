<footer class="site-footer">
    <div class="footer-backtop" onclick="window.scrollTo({top:0,behavior:'smooth'})">
        ↑ &nbsp; VOLVER AL INICIO
    </div>
    <div class="footer-grid">
        <div class="footer-brand">
            <div class="brand-name">market<span>Place</span></div>
            <div class="brand-uni">Universidad Autónoma de Bucaramanga</div>
            <p class="brand-desc">Proyecto académico de estudiantes de Ingeniería de Sistemas — Curso de Desarrollo Web. UNAB, Bucaramanga.</p>
            <div class="brand-info">
                <span><i class="fas fa-map-marker-alt"></i> Calle 48 #39-234, Bucaramanga</span>
                <span><i class="fas fa-phone"></i> +57 (7) 643 6111</span>
                <span><i class="fas fa-envelope"></i> <a href="mailto:webmaster@unab.edu.co">webmaster@unab.edu.co</a></span>
                <span><i class="fas fa-globe"></i> <a href="https://www.unab.edu.co" target="_blank">www.unab.edu.co</a></span>
            </div>
        </div>
        <div class="footer-col">
            <h5>Conócenos</h5>
            <a href="#">Sobre el proyecto</a>
            <a href="#">Equipo</a>
            <a href="#">UNAB Sistemas</a>
            <a href="#">GitHub</a>
            <a href="#">Documentación</a>
        </div>
        <div class="footer-col">
            <h5>Marketplace</h5>
            <a href="{{ url('/product') }}">Ver productos</a>
            <a href="{{ url('/product/create') }}">Publicar producto</a>
            <a href="#">Categorías</a>
            <a href="#">Ofertas</a>
            <a href="#">Más vendidos</a>
        </div>
        <div class="footer-col">
            <h5>Soporte</h5>
            <a href="#">Centro de ayuda</a>
            <a href="#">Manual de usuario</a>
            <a href="#">Reportar error</a>
            <a href="#">Contáctanos</a>
            <a href="#">FAQ</a>
        </div>
    </div>
    <hr class="footer-hr">
    <div class="footer-bottom">
        <div class="footer-bottom-links">
            <a href="#">Términos</a>
            <a href="#">Privacidad</a>
            <a href="#">Cookies</a>
            <a href="#">Accesibilidad</a>
        </div>
        <div class="footer-copy">© {{ date('Y') }} MarketPlace UNAB — Proyecto académico.</div>
    </div>
</footer>
