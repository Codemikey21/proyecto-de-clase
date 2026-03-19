@extends('layout.app')
@section('title', 'MarketPlace UNAB — Bienvenido')

@section('content')

{{-- HERO --}}
<section style="position:relative;overflow:hidden;min-height:100vh;display:flex;align-items:center;justify-content:center;background:var(--surface);border-bottom:1px solid var(--border);">
    <div style="position:absolute;inset:0;background:radial-gradient(ellipse 60% 70% at 20% 50%,rgba(0,255,135,0.06) 0%,transparent 60%),radial-gradient(ellipse 40% 50% at 80% 30%,rgba(255,77,109,0.04) 0%,transparent 55%);pointer-events:none;"></div>
    <div style="position:absolute;inset:0;background-image:linear-gradient(rgba(255,255,255,0.02) 1px,transparent 1px),linear-gradient(90deg,rgba(255,255,255,0.02) 1px,transparent 1px);background-size:60px 60px;pointer-events:none;"></div>

    <div style="text-align:center;padding:40px 24px;position:relative;max-width:900px;">

        <div style="display:inline-flex;align-items:center;gap:7px;font-size:11px;font-weight:700;letter-spacing:2.5px;text-transform:uppercase;color:var(--accent);background:rgba(0,255,135,0.08);padding:6px 16px;border-radius:20px;border:1px solid rgba(0,255,135,0.15);margin-bottom:28px;">
            <i class="fas fa-bolt"></i> Marketplace Académico · UNAB 2026
        </div>

        <h1 style="font-family:var(--font-head);font-size:clamp(48px,9vw,96px);font-weight:900;line-height:1;letter-spacing:-4px;color:var(--text);margin-bottom:20px;">
            Compra y vende<br>en la <span style="color:var(--accent);">comunidad</span>
        </h1>

        <p style="font-size:18px;color:var(--text-sec);max-width:520px;margin:0 auto 40px;line-height:1.7;">
            El marketplace oficial de la UNAB. Conecta con otros estudiantes, vende lo que ya no usas y encuentra lo que necesitas.
        </p>

        <div style="display:flex;align-items:center;justify-content:center;gap:14px;flex-wrap:wrap;margin-bottom:64px;">
            <a href="{{ url('/product') }}" style="display:inline-flex;align-items:center;gap:8px;background:var(--accent);color:#000;font-family:var(--font-body);font-size:15px;font-weight:700;padding:15px 32px;border-radius:10px;text-decoration:none;transition:opacity .2s;">
                <i class="fas fa-store"></i> Ver Productos
            </a>
            <a href="{{ url('/product/create') }}" style="display:inline-flex;align-items:center;gap:8px;background:transparent;color:var(--text-sec);font-family:var(--font-body);font-size:15px;font-weight:500;padding:15px 24px;border-radius:10px;border:1px solid var(--border-h);text-decoration:none;transition:all .2s;">
                <i class="fas fa-plus"></i> Publicar Producto
            </a>
        </div>

        {{-- STATS --}}
        <div style="display:flex;align-items:center;justify-content:center;gap:48px;flex-wrap:wrap;padding-top:36px;border-top:1px solid var(--border);">
            <div style="text-align:center;">
                <div style="font-family:var(--font-head);font-size:32px;font-weight:900;color:var(--accent);letter-spacing:-1px;">+2.4K</div>
                <div style="font-size:11px;color:var(--text-sec);text-transform:uppercase;letter-spacing:1px;">Productos activos</div>
            </div>
            <div style="text-align:center;">
                <div style="font-family:var(--font-head);font-size:32px;font-weight:900;color:var(--accent);letter-spacing:-1px;">+850</div>
                <div style="font-size:11px;color:var(--text-sec);text-transform:uppercase;letter-spacing:1px;">Vendedores</div>
            </div>
            <div style="text-align:center;">
                <div style="font-family:var(--font-head);font-size:32px;font-weight:900;color:var(--accent);letter-spacing:-1px;">4.9★</div>
                <div style="font-size:11px;color:var(--text-sec);text-transform:uppercase;letter-spacing:1px;">Valoración media</div>
            </div>
            <div style="text-align:center;">
                <div style="font-family:var(--font-head);font-size:32px;font-weight:900;color:var(--accent);letter-spacing:-1px;">100%</div>
                <div style="font-size:11px;color:var(--text-sec);text-transform:uppercase;letter-spacing:1px;">Comunidad UNAB</div>
            </div>
        </div>

    </div>
</section>

{{-- CATEGORÍAS --}}
<section style="padding:80px 24px;background:var(--bg);border-bottom:1px solid var(--border);">
    <div style="max-width:1200px;margin:0 auto;">
        <div style="text-align:center;margin-bottom:48px;">
            <div style="font-size:10px;font-weight:800;letter-spacing:3px;text-transform:uppercase;color:var(--accent);margin-bottom:10px;">Explora</div>
            <h2 style="font-family:var(--font-head);font-size:clamp(28px,4vw,42px);font-weight:900;letter-spacing:-1px;">Todas las categorías</h2>
        </div>
        <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(150px,1fr));gap:14px;">

            @php
            $cats = [
                ['ico'=>'💻','name'=>'Laptops'],
                ['ico'=>'🎧','name'=>'Audio'],
                ['ico'=>'📱','name'=>'Smartphones'],
                ['ico'=>'📟','name'=>'Tablets'],
                ['ico'=>'⌚','name'=>'Wearables'],
                ['ico'=>'🖱️','name'=>'Accesorios'],
                ['ico'=>'🖥️','name'=>'Monitores'],
                ['ico'=>'📚','name'=>'Libros'],
            ];
            @endphp

            @foreach($cats as $cat)
            <a href="{{ url('/product') }}" style="display:flex;flex-direction:column;align-items:center;justify-content:center;gap:10px;padding:24px 16px;background:var(--card);border:1px solid var(--border);border-radius:16px;text-decoration:none;transition:all .25s;cursor:pointer;" onmouseover="this.style.borderColor='var(--accent)';this.style.background='rgba(0,255,135,0.05)'" onmouseout="this.style.borderColor='rgba(255,255,255,0.06)';this.style.background='var(--card)'">
                <span style="font-size:28px;">{{ $cat['ico'] }}</span>
                <span style="font-size:12px;font-weight:700;color:var(--text-sec);text-align:center;">{{ $cat['name'] }}</span>
            </a>
            @endforeach

        </div>
    </div>
</section>

{{-- CÓMO FUNCIONA --}}
<section style="padding:80px 24px;background:var(--surface);border-bottom:1px solid var(--border);">
    <div style="max-width:1000px;margin:0 auto;">
        <div style="text-align:center;margin-bottom:56px;">
            <div style="font-size:10px;font-weight:800;letter-spacing:3px;text-transform:uppercase;color:var(--accent);margin-bottom:10px;">Simple</div>
            <h2 style="font-family:var(--font-head);font-size:clamp(28px,4vw,42px);font-weight:900;letter-spacing:-1px;">¿Cómo funciona?</h2>
        </div>
        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:24px;">

            @php
            $steps = [
                ['num'=>'01','ico'=>'fas fa-user-plus','title'=>'Regístrate','desc'=>'Crea tu cuenta con tu correo UNAB en segundos.'],
                ['num'=>'02','ico'=>'fas fa-upload','title'=>'Publica','desc'=>'Sube fotos, describe tu producto y fija el precio.'],
                ['num'=>'03','ico'=>'fas fa-search','title'=>'Explora','desc'=>'Navega miles de productos de la comunidad UNAB.'],
                ['num'=>'04','ico'=>'fas fa-handshake','title'=>'Conecta','desc'=>'Contacta al vendedor y completa la transacción.'],
            ];
            @endphp

            @foreach($steps as $step)
            <div style="background:var(--card);border:1px solid var(--border);border-radius:16px;padding:28px 24px;position:relative;overflow:hidden;">
                <div style="position:absolute;top:16px;right:20px;font-family:var(--font-head);font-size:48px;font-weight:900;color:rgba(0,255,135,0.05);line-height:1;">{{ $step['num'] }}</div>
                <div style="width:44px;height:44px;background:rgba(0,255,135,0.08);border:1px solid rgba(0,255,135,0.15);border-radius:10px;display:flex;align-items:center;justify-content:center;margin-bottom:16px;">
                    <i class="{{ $step['ico'] }}" style="color:var(--accent);font-size:18px;"></i>
                </div>
                <h3 style="font-family:var(--font-head);font-size:18px;font-weight:900;margin-bottom:8px;letter-spacing:-0.3px;">{{ $step['title'] }}</h3>
                <p style="font-size:13px;color:var(--text-sec);line-height:1.6;">{{ $step['desc'] }}</p>
            </div>
            @endforeach

        </div>
    </div>
</section>

{{-- POR QUÉ ELEGIRNOS --}}
<section style="padding:80px 24px;background:var(--bg);border-bottom:1px solid var(--border);">
    <div style="max-width:1000px;margin:0 auto;">
        <div style="text-align:center;margin-bottom:56px;">
            <div style="font-size:10px;font-weight:800;letter-spacing:3px;text-transform:uppercase;color:var(--accent);margin-bottom:10px;">Ventajas</div>
            <h2 style="font-family:var(--font-head);font-size:clamp(28px,4vw,42px);font-weight:900;letter-spacing:-1px;">¿Por qué MarketPlace UNAB?</h2>
        </div>
        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:20px;">

            @php
            $features = [
                ['ico'=>'fas fa-shield-alt','title'=>'100% Seguro','desc'=>'Todos los vendedores son estudiantes verificados de la UNAB.'],
                ['ico'=>'fas fa-tag','title'=>'Mejores precios','desc'=>'Encuentra productos a precios de estudiante, sin intermediarios.'],
                ['ico'=>'fas fa-map-marker-alt','title'=>'Entrega en campus','desc'=>'Coordina la entrega directamente en la universidad.'],
                ['ico'=>'fas fa-headset','title'=>'Soporte académico','desc'=>'Respaldado por el equipo de Ingeniería de Sistemas UNAB.'],
                ['ico'=>'fas fa-recycle','title'=>'Economía circular','desc'=>'Dale una segunda vida a tus productos y ayuda al medio ambiente.'],
                ['ico'=>'fas fa-users','title'=>'Comunidad activa','desc'=>'Miles de estudiantes comprando y vendiendo cada día.'],
            ];
            @endphp

            @foreach($features as $f)
            <div style="display:flex;gap:16px;background:var(--card);border:1px solid var(--border);border-radius:14px;padding:20px;">
                <div style="width:40px;height:40px;background:rgba(0,255,135,0.08);border:1px solid rgba(0,255,135,0.15);border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                    <i class="{{ $f['ico'] }}" style="color:var(--accent);font-size:16px;"></i>
                </div>
                <div>
                    <h4 style="font-size:14px;font-weight:700;margin-bottom:4px;">{{ $f['title'] }}</h4>
                    <p style="font-size:12px;color:var(--text-sec);line-height:1.6;">{{ $f['desc'] }}</p>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>

{{-- CTA FINAL --}}
<section style="padding:100px 24px;background:var(--surface);text-align:center;">
    <div style="max-width:600px;margin:0 auto;">
        <h2 style="font-family:var(--font-head);font-size:clamp(32px,5vw,56px);font-weight:900;letter-spacing:-2px;margin-bottom:16px;">
            ¿Listo para <span style="color:var(--accent);">empezar?</span>
        </h2>
        <p style="font-size:16px;color:var(--text-sec);margin-bottom:36px;line-height:1.7;">
            Únete a miles de estudiantes que ya compran y venden en la comunidad UNAB.
        </p>
        <div style="display:flex;align-items:center;justify-content:center;gap:14px;flex-wrap:wrap;">
            <a href="{{ url('/product') }}" style="display:inline-flex;align-items:center;gap:8px;background:var(--accent);color:#000;font-family:var(--font-body);font-size:15px;font-weight:700;padding:15px 32px;border-radius:10px;text-decoration:none;">
                <i class="fas fa-store"></i> Explorar Productos
            </a>
            <a href="{{ url('/product/create') }}" style="display:inline-flex;align-items:center;gap:8px;background:transparent;color:var(--text-sec);font-family:var(--font-body);font-size:15px;font-weight:500;padding:15px 24px;border-radius:10px;border:1px solid var(--border-h);text-decoration:none;">
                <i class="fas fa-plus"></i> Publicar ahora
            </a>
        </div>
    </div>
</section>

@endsection
