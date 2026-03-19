@extends('layout.app')
@section('title', 'Categorías — Admin MarketPlace UNAB')

@section('content')
<div style="max-width:1000px;margin:0 auto;padding:40px 24px 80px;">

    <div style="margin-bottom:32px;display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:16px;">
        <div>
            <div style="font-size:10px;font-weight:800;letter-spacing:3px;text-transform:uppercase;color:var(--accent);margin-bottom:8px;display:flex;align-items:center;gap:8px;">
                <span style="display:block;width:20px;height:2px;background:var(--accent);border-radius:2px;"></span>
                Admin · Categorías
            </div>
            <h1 style="font-family:var(--font-head);font-size:clamp(24px,4vw,36px);font-weight:900;letter-spacing:-1px;">
                Gestión de Categorías
            </h1>
        </div>
        <div style="display:flex;gap:10px;">
            <a href="{{ route('admin') }}" style="display:inline-flex;align-items:center;gap:6px;background:var(--card);border:1px solid var(--border);color:var(--text-sec);font-family:var(--font-body);font-size:13px;font-weight:600;padding:10px 18px;border-radius:10px;text-decoration:none;">
                <i class="fas fa-arrow-left"></i> Admin
            </a>
            <a href="{{ route('categoria.create') }}" style="display:inline-flex;align-items:center;gap:6px;background:var(--accent);color:#000;font-family:var(--font-body);font-size:13px;font-weight:700;padding:10px 18px;border-radius:10px;text-decoration:none;">
                <i class="fas fa-plus"></i> Nueva Categoría
            </a>
        </div>
    </div>

    @if(session('success'))
    <div style="background:rgba(0,255,135,0.08);border:1px solid rgba(0,255,135,0.2);color:var(--accent);padding:14px 18px;border-radius:12px;margin-bottom:24px;font-size:13px;display:flex;align-items:center;gap:10px;">
        <i class="fas fa-check-circle"></i> {{ session('success') }}
    </div>
    @endif

    <div style="background:var(--card);border:1px solid var(--border);border-radius:16px;overflow:hidden;">
        <div style="padding:16px 24px;border-bottom:1px solid var(--border);">
            <span style="font-size:13px;font-weight:600;color:var(--text-sec);">{{ $categorias->count() }} categorías en total</span>
        </div>

        @forelse($categorias as $cat)
        <div style="display:flex;align-items:center;gap:16px;padding:16px 24px;border-bottom:1px solid var(--border);transition:background .2s;" onmouseover="this.style.background='var(--card-h)'" onmouseout="this.style.background='transparent'">

            <div style="width:42px;height:42px;background:rgba(0,255,135,0.08);border:1px solid rgba(0,255,135,0.15);border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                <i class="fas fa-tag" style="color:var(--accent);font-size:16px;"></i>
            </div>

            <div style="flex:1;">
                <div style="font-size:14px;font-weight:700;color:var(--text);margin-bottom:2px;">{{ $cat->name }}</div>
                <div style="font-size:11px;color:var(--text-sec);">{{ $cat->products_count }} productos asociados</div>
            </div>

            <div style="display:flex;align-items:center;gap:8px;">
                <a href="{{ route('categoria.edit', $cat) }}" style="display:inline-flex;align-items:center;gap:6px;background:var(--surface);border:1px solid var(--border);color:var(--text-sec);font-family:var(--font-body);font-size:12px;font-weight:600;padding:8px 14px;border-radius:8px;text-decoration:none;transition:all .2s;" onmouseover="this.style.borderColor='var(--accent)';this.style.color='var(--accent)'" onmouseout="this.style.borderColor='var(--border)';this.style.color='var(--text-sec)'">
                    <i class="fas fa-edit"></i> Editar
                </a>
                <form action="{{ route('categoria.destroy', $cat) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" onclick="return confirm('¿Eliminar esta categoría?')" style="display:inline-flex;align-items:center;gap:6px;background:rgba(255,77,109,0.08);border:1px solid rgba(255,77,109,0.2);color:var(--accent2);font-family:var(--font-body);font-size:12px;font-weight:600;padding:8px 14px;border-radius:8px;cursor:pointer;transition:all .2s;" onmouseover="this.style.background='rgba(255,77,109,0.15)'" onmouseout="this.style.background='rgba(255,77,109,0.08)'">
                        <i class="fas fa-trash"></i> Eliminar
                    </button>
                </form>
            </div>
        </div>
        @empty
        <div style="text-align:center;padding:60px 24px;color:var(--text-sec);">
            <i class="fas fa-tags" style="font-size:36px;margin-bottom:14px;display:block;opacity:.3;"></i>
            <p style="font-size:14px;">No hay categorías todavía</p>
            <a href="{{ route('categoria.create') }}" style="display:inline-flex;align-items:center;gap:6px;background:var(--accent);color:#000;font-family:var(--font-body);font-size:13px;font-weight:700;padding:10px 20px;border-radius:10px;text-decoration:none;margin-top:16px;">
                <i class="fas fa-plus"></i> Crear primera categoría
            </a>
        </div>
        @endforelse
    </div>

</div>
@endsection
