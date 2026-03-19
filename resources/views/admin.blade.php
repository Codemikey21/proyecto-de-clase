@extends('layout.app')
@section('title', 'Admin — MarketPlace UNAB')

@section('content')

<div style="max-width:1200px;margin:0 auto;padding:40px 24px 80px;">

    {{-- HEADER --}}
    <div style="margin-bottom:40px;">
        <div style="font-size:10px;font-weight:800;letter-spacing:3px;text-transform:uppercase;color:var(--accent);margin-bottom:8px;display:flex;align-items:center;gap:8px;">
            <span style="display:block;width:20px;height:2px;background:var(--accent);border-radius:2px;"></span>
            Panel de Control
        </div>
        <h1 style="font-family:var(--font-head);font-size:clamp(28px,5vw,44px);font-weight:900;letter-spacing:-2px;margin-bottom:8px;">
            Administración
        </h1>
        <p style="font-size:13px;color:var(--text-sec);">Gestiona productos, categorías y usuarios del marketplace.</p>
    </div>

    {{-- STATS --}}
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:16px;margin-bottom:40px;">

        <div style="background:var(--card);border:1px solid var(--border);border-radius:16px;padding:24px;position:relative;overflow:hidden;">
            <div style="position:absolute;top:0;right:0;width:80px;height:80px;background:rgba(0,255,135,0.05);border-radius:0 16px 0 80px;"></div>
            <div style="font-size:11px;font-weight:700;letter-spacing:1px;text-transform:uppercase;color:var(--text-sec);margin-bottom:12px;">Total Productos</div>
            <div style="font-family:var(--font-head);font-size:40px;font-weight:900;color:var(--accent);letter-spacing:-2px;line-height:1;">{{ $totalProductos }}</div>
            <div style="font-size:11px;color:var(--text-sec);margin-top:8px;"><i class="fas fa-box" style="color:var(--accent);margin-right:4px;"></i> En el marketplace</div>
        </div>

        <div style="background:var(--card);border:1px solid var(--border);border-radius:16px;padding:24px;position:relative;overflow:hidden;">
            <div style="position:absolute;top:0;right:0;width:80px;height:80px;background:rgba(255,77,109,0.05);border-radius:0 16px 0 80px;"></div>
            <div style="font-size:11px;font-weight:700;letter-spacing:1px;text-transform:uppercase;color:var(--text-sec);margin-bottom:12px;">Categorías</div>
            <div style="font-family:var(--font-head);font-size:40px;font-weight:900;color:var(--accent2);letter-spacing:-2px;line-height:1;">{{ $totalCategorias }}</div>
            <div style="font-size:11px;color:var(--text-sec);margin-top:8px;"><i class="fas fa-tags" style="color:var(--accent2);margin-right:4px;"></i> Activas</div>
        </div>

        <div style="background:var(--card);border:1px solid var(--border);border-radius:16px;padding:24px;position:relative;overflow:hidden;">
            <div style="position:absolute;top:0;right:0;width:80px;height:80px;background:rgba(59,130,246,0.05);border-radius:0 16px 0 80px;"></div>
            <div style="font-size:11px;font-weight:700;letter-spacing:1px;text-transform:uppercase;color:var(--text-sec);margin-bottom:12px;">Vendedores</div>
            <div style="font-family:var(--font-head);font-size:40px;font-weight:900;color:#3b82f6;letter-spacing:-2px;line-height:1;">+850</div>
            <div style="font-size:11px;color:var(--text-sec);margin-top:8px;"><i class="fas fa-users" style="color:#3b82f6;margin-right:4px;"></i> Comunidad UNAB</div>
        </div>

        <div style="background:var(--card);border:1px solid var(--border);border-radius:16px;padding:24px;position:relative;overflow:hidden;">
            <div style="position:absolute;top:0;right:0;width:80px;height:80px;background:rgba(34,197,94,0.05);border-radius:0 16px 0 80px;"></div>
            <div style="font-size:11px;font-weight:700;letter-spacing:1px;text-transform:uppercase;color:var(--text-sec);margin-bottom:12px;">Ventas del mes</div>
            <div style="font-family:var(--font-head);font-size:40px;font-weight:900;color:#22c55e;letter-spacing:-2px;line-height:1;">$0</div>
            <div style="font-size:11px;color:var(--text-sec);margin-top:8px;"><i class="fas fa-chart-line" style="color:#22c55e;margin-right:4px;"></i> Marzo 2026</div>
        </div>

    </div>

    <div style="display:grid;grid-template-columns:1fr 1fr;gap:24px;margin-bottom:32px;">

        {{-- ÚLTIMOS PRODUCTOS --}}
        <div style="background:var(--card);border:1px solid var(--border);border-radius:16px;overflow:hidden;">
            <div style="padding:20px 24px;border-bottom:1px solid var(--border);display:flex;align-items:center;justify-content:space-between;">
                <h3 style="font-family:var(--font-head);font-size:16px;font-weight:900;letter-spacing:-0.3px;">Últimos Productos</h3>
                <a href="{{ route('product.index') }}" style="font-size:11px;color:var(--accent);font-weight:600;text-decoration:none;">Ver todos →</a>
            </div>
            <div style="padding:8px 0;">
                @forelse($ultimosProductos as $p)
                <div style="display:flex;align-items:center;gap:14px;padding:12px 24px;border-bottom:1px solid var(--border);transition:background .2s;" onmouseover="this.style.background='var(--card-h)'" onmouseout="this.style.background='transparent'">
                    <div style="width:42px;height:42px;border-radius:10px;background:var(--surface);border:1px solid var(--border);display:flex;align-items:center;justify-content:center;overflow:hidden;flex-shrink:0;">
                        @if($p->image)
                            <img src="{{ asset('storage/'.$p->image) }}" style="width:100%;height:100%;object-fit:cover;">
                        @else
                            <span style="font-size:18px;">📦</span>
                        @endif
                    </div>
                    <div style="flex:1;min-width:0;">
                        <div style="font-size:13px;font-weight:600;color:var(--text);white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">{{ $p->name }}</div>
                        <div style="font-size:11px;color:var(--text-sec);">{{ $p->category->name ?? 'Sin categoría' }}</div>
                    </div>
                    <div style="font-family:var(--font-head);font-size:14px;font-weight:900;color:var(--accent);letter-spacing:-0.5px;flex-shrink:0;">
                        ${{ number_format($p->price, 2) }}
                    </div>
                    <form action="{{ route('product.destroy', $p) }}" method="POST" style="flex-shrink:0;">
                        @method('DELETE')
                        @csrf
                        <button type="submit" style="background:rgba(255,77,109,0.1);border:1px solid rgba(255,77,109,0.2);border-radius:6px;width:30px;height:30px;display:flex;align-items:center;justify-content:center;cursor:pointer;color:var(--accent2);font-size:12px;transition:all .2s;" onmouseover="this.style.background='rgba(255,77,109,0.2)'" onmouseout="this.style.background='rgba(255,77,109,0.1)'">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </div>
                @empty
                <div style="text-align:center;padding:40px;color:var(--text-sec);font-size:13px;">
                    <i class="fas fa-box-open" style="font-size:28px;margin-bottom:10px;display:block;opacity:.3;"></i>
                    No hay productos todavía
                </div>
                @endforelse
            </div>
        </div>

        {{-- CATEGORÍAS --}}
        <div style="background:var(--card);border:1px solid var(--border);border-radius:16px;overflow:hidden;">
            <div style="padding:20px 24px;border-bottom:1px solid var(--border);display:flex;align-items:center;justify-content:space-between;">
                <h3 style="font-family:var(--font-head);font-size:16px;font-weight:900;letter-spacing:-0.3px;">Productos por Categoría</h3>
            </div>
            <div style="padding:20px 24px;">
                @forelse($productosPorCategoria as $cat)
                <div style="margin-bottom:16px;">
                    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:6px;">
                        <span style="font-size:12px;font-weight:600;color:var(--text);">{{ $cat->name }}</span>
                        <span style="font-size:11px;color:var(--text-sec);">{{ $cat->products_count }} productos</span>
                    </div>
                    <div style="height:6px;background:var(--surface);border-radius:3px;overflow:hidden;border:1px solid var(--border);">
                        @php
                            $pct = $totalProductos > 0 ? ($cat->products_count / $totalProductos) * 100 : 0;
                        @endphp
                        <div style="height:100%;width:{{ $pct }}%;background:var(--accent);border-radius:3px;transition:width .5s;"></div>
                    </div>
                </div>
                @empty
                <div style="text-align:center;padding:40px;color:var(--text-sec);font-size:13px;">
                    <i class="fas fa-tags" style="font-size:28px;margin-bottom:10px;display:block;opacity:.3;"></i>
                    No hay categorías
                </div>
                @endforelse
            </div>
        </div>

    </div>

    {{-- ACCIONES RÁPIDAS --}}
    <div style="background:var(--card);border:1px solid var(--border);border-radius:16px;padding:24px;">
        <h3 style="font-family:var(--font-head);font-size:16px;font-weight:900;letter-spacing:-0.3px;margin-bottom:20px;">Acciones Rápidas</h3>
        <div style="display:flex;gap:12px;flex-wrap:wrap;">
            <a href="{{ route('product.create') }}" style="display:inline-flex;align-items:center;gap:8px;background:var(--accent);color:#000;font-family:var(--font-body);font-size:13px;font-weight:700;padding:11px 20px;border-radius:10px;text-decoration:none;transition:opacity .2s;">
                <i class="fas fa-plus"></i> Nuevo Producto
            </a>
            <a href="{{ route('product.index') }}" style="display:inline-flex;align-items:center;gap:8px;background:var(--surface);color:var(--text);font-family:var(--font-body);font-size:13px;font-weight:600;padding:11px 20px;border-radius:10px;text-decoration:none;border:1px solid var(--border);transition:all .2s;">
                <i class="fas fa-store"></i> Ver Marketplace
            </a>
            <a href="{{ url('/') }}" style="display:inline-flex;align-items:center;gap:8px;background:var(--surface);color:var(--text);font-family:var(--font-body);font-size:13px;font-weight:600;padding:11px 20px;border-radius:10px;text-decoration:none;border:1px solid var(--border);transition:all .2s;">
                <i class="fas fa-home"></i> Ir al Inicio
            </a>
        </div>
    </div>

</div>

@endsection
