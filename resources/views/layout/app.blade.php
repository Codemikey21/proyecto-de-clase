<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="TechMarket — Marketplace de componentes de PC">
    <meta name="author" content="TechMarket">
    <title>TechMarket</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@700;800&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- CSS principal -->
    <link rel="stylesheet" href="{{ asset('css/marketplace.css') }}">
</head>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
<body>

    <!-- NAVBAR -->
    <nav>
        <a href="/product" class="brand">⚡ TECHMARKET</a>
        <div class="nav-links">
            <a href="/product">Productos</a>
            <a href="/product/create">Agregar</a>
        </div>
    </nav>

    <!-- CONTENIDO DE CADA VISTA -->
    <main>
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer>
        <div class="footer-inner">
            <span class="brand">⚡ TECHMARKET</span>
            <p>© {{ date('Y') }} TechMarket. Todos los derechos reservados.</p>
            <div class="footer-links">
                <a href="#">Términos</a>
                <a href="#">Privacidad</a>
                <a href="#">Soporte</a>
            </div>
        </div>
    </footer>

</body>
</html>
