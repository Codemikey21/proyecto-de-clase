@extends('layout.app')
@section('title', 'Mi Carrito — MarketPlace UNAB')

@section('content')
<div style="max-width:900px;margin:0 auto;padding:40px 24px 80px;">

    <div style="margin-bottom:32px;">
        <div style="font-size:10px;font-weight:800;letter-spacing:3px;text-transform:uppercase;color:var(--accent);margin-bottom:8px;display:flex;align-items:center;gap:8px;">
            <span style="display:block;width:20px;height:2px;background:var(--accent);border-radius:2px;"></span>
            Mi Carrito
        </div>
        <h1 style="font-family:var(--font-head);font-size:clamp(24px,4vw,36px);font-weight:900;letter-spacing:-1px;">
            Carrito de Compras
        </h1>
    </div>

    @if(session('success'))
    <div style="background:rgba(0,255,135,0.08);border:1px solid rgba(0,255,135,0.2);color:var(--accent);padding:14px 18px;border-radius:12px;margin-bottom:24px;font-size:13px;display:flex;align-items:center;gap:10px;">
        <i class="fas fa-check-circle"></i> {{ session('success') }}
    </div>
    @endif

    @if($items->count() > 0)

    <div style="display:grid;grid-template-columns:1fr 320px;gap:24px;align-items:start;">

        {{-- LISTA DE PRODUCTOS --}}
        <div style="background:var(--card);border:1px solid var(--border);border-radius:16px;overflow:hidden;">
            <div style="padding:16px 24px;border-bottom:1px solid var(--border);display:flex;align-items:center;justify-content:space-between;">
                <span style="font-size:13px;font-weight:600;color:var(--text-sec);">{{ $items->count() }} productos</span>
                <form action="{{ route('cart.clear') }}" method="POST">
                    @csrf
                    <button type="submit" style="background:none;border:none;font-size:12px;color:var(--accent2);cursor:pointer;font-family:var(--font-body);font-weight:600;">
                        <i class="fas fa-trash"></i> Vaciar carrito
                    </button>
                </form>
            </div>

            @foreach($items as $item)
            <div style="display:flex;align-items:center;gap:16px;padding:20px 24px;border-bottom:1px solid var(--border);">

                <div style="width:72px;height:72px;background:var(--surface);border:1px solid var(--border);border-radius:12px;display:flex;align-items:center;justify-content:center;overflow:hidden;flex-shrink:0;">
                    @if($item->product->image)
                        <img src="{{ asset('storage/'.$item->product->image) }}" style="width:100%;height:100%;object-fit:cover;">
                    @else
                        <span style="font-size:24px;">📦</span>
                    @endif
                </div>

                <div style="flex:1;min-width:0;">
                    <div style="font-size:14px;font-weight:700;color:var(--text);margin-bottom:4px;">{{ $item->product->name }}</div>
                    <div style="font-size:12px;color:var(--text-sec);">{{ $item->product->category->name ?? 'Sin categoría' }}</div>
                    <div style="font-family:var(--font-head);font-size:18px;font-weight:900;color:var(--accent);letter-spacing:-0.5px;margin-top:6px;">
                        ${{ number_format($item->product->price * $item->quantity, 2) }}
                    </div>
                    <div style="font-size:11px;color:var(--text-muted);">
                        ${{ number_format($item->product->price, 2) }} × {{ $item->quantity }}
                    </div>
                </div>

                <form action="{{ route('cart.destroy', $item) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" style="background:rgba(255,77,109,0.08);border:1px solid rgba(255,77,109,0.2);border-radius:8px;width:36px;height:36px;display:flex;align-items:center;justify-content:center;cursor:pointer;color:var(--accent2);font-size:13px;transition:all .2s;" onmouseover="this.style.background='rgba(255,77,109,0.2)'" onmouseout="this.style.background='rgba(255,77,109,0.08)'">
                        <i class="fas fa-times"></i>
                    </button>
                </form>

            </div>
            @endforeach
        </div>

        {{-- RESUMEN --}}
        <div style="background:var(--card);border:1px solid var(--border);border-radius:16px;padding:24px;position:sticky;top:80px;">
            <h3 style="font-family:var(--font-head);font-size:18px;font-weight:900;letter-spacing:-0.3px;margin-bottom:20px;">Resumen</h3>

            <div style="display:flex;flex-direction:column;gap:10px;margin-bottom:20px;padding-bottom:20px;border-bottom:1px solid var(--border);">
                @foreach($items as $item)
                <div style="display:flex;justify-content:space-between;font-size:13px;">
                    <span style="color:var(--text-sec);">{{ Str::limit($item->product->name, 25) }} ×{{ $item->quantity }}</span>
                    <span style="font-weight:600;">${{ number_format($item->product->price * $item->quantity, 2) }}</span>
                </div>
                @endforeach
            </div>

            <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:20px;">
                <span style="font-size:14px;font-weight:700;">Total</span>
                <span style="font-family:var(--font-head);font-size:24px;font-weight:900;color:var(--accent);letter-spacing:-1px;">${{ number_format($total, 2) }}</span>
            </div>

            <button style="width:100%;background:var(--accent);border:none;border-radius:12px;padding:14px;font-size:14px;font-weight:700;font-family:var(--font-body);cursor:pointer;color:#000;display:flex;align-items:center;justify-content:center;gap:8px;margin-bottom:10px;">
                <i class="fas fa-lock"></i> Proceder al pago
            </button>

            <a href="{{ route('product.index') }}" style="display:flex;align-items:center;justify-content:center;gap:8px;background:var(--surface);border:1px solid var(--border);border-radius:12px;padding:12px;font-size:13px;font-weight:600;font-family:var(--font-body);color:var(--text-sec);text-decoration:none;">
                <i class="fas fa-arrow-left"></i> Seguir comprando
            </a>
        </div>

    </div>

    @else
    <div style="text-align:center;padding:80px 24px;background:var(--card);border:1px solid var(--border);border-radius:16px;">
        <div style="font-size:48px;margin-bottom:16px;opacity:.3;">🛒</div>
        <h3 style="font-family:var(--font-head);font-size:22px;font-weight:900;margin-bottom:8px;">Tu carrito está vacío</h3>
        <p style="font-size:13px;color:var(--text-sec);margin-bottom:24px;">Agrega productos desde el marketplace</p>
        <a href="{{ route('product.index') }}" style="display:inline-flex;align-items:center;gap:8px;background:var(--accent);color:#000;font-family:var(--font-body);font-size:14px;font-weight:700;padding:13px 28px;border-radius:10px;text-decoration:none;">
            <i class="fas fa-store"></i> Explorar Productos
        </a>
    </div>
    @endif

</div>
@endsection
