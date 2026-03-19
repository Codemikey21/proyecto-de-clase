@extends('layout.app')
@section('title', 'Editar Categoría — Admin')

@section('content')
<div style="max-width:600px;margin:0 auto;padding:40px 24px 80px;">

    <div style="margin-bottom:32px;">
        <div style="font-size:10px;font-weight:800;letter-spacing:3px;text-transform:uppercase;color:var(--accent);margin-bottom:8px;display:flex;align-items:center;gap:8px;">
            <span style="display:block;width:20px;height:2px;background:var(--accent);border-radius:2px;"></span>
            Admin · Categorías
        </div>
        <h1 style="font-family:var(--font-head);font-size:clamp(24px,4vw,36px);font-weight:900;letter-spacing:-1px;">
            Editar Categoría
        </h1>
    </div>

    @if($errors->any())
    <div style="background:rgba(255,77,109,0.08);border:1px solid rgba(255,77,109,0.2);color:var(--accent2);padding:14px 18px;border-radius:12px;margin-bottom:24px;font-size:13px;">
        <i class="fas fa-exclamation-circle"></i> <strong>Corrige los siguientes errores:</strong>
        <ul style="margin-top:8px;padding-left:16px;">
            @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
        </ul>
    </div>
    @endif

    <div style="background:var(--card);border:1px solid var(--border);border-radius:16px;overflow:hidden;">
        <div style="background:var(--surface);padding:20px 28px;border-bottom:1px solid var(--border);display:flex;align-items:center;gap:14px;">
            <div style="width:44px;height:44px;background:rgba(0,255,135,0.08);border:1px solid rgba(0,255,135,0.15);border-radius:12px;display:flex;align-items:center;justify-content:center;">
                <i class="fas fa-edit" style="color:var(--accent);font-size:18px;"></i>
            </div>
            <div>
                <div style="font-family:var(--font-head);font-size:16px;font-weight:900;">Editar: {{ $categoria->name }}</div>
                <div style="font-size:12px;color:var(--text-sec);margin-top:2px;">Modifica el nombre de la categoría</div>
            </div>
        </div>

        <form action="{{ route('categoria.update', $categoria) }}" method="POST" style="padding:28px;">
            @csrf
            @method('PUT')
            <div style="display:flex;flex-direction:column;gap:6px;margin-bottom:24px;">
                <label style="font-size:11px;font-weight:700;color:var(--text);letter-spacing:.3px;text-transform:uppercase;">
                    Nombre de la Categoría <span style="color:var(--accent2);">*</span>
                </label>
                <input type="text" name="name"
                       value="{{ old('name', $categoria->name) }}"
                       placeholder="Ej: Electrónica, Ropa, Libros..."
                       style="background:var(--surface);border:1px solid var(--border);border-radius:10px;color:var(--text);font-family:var(--font-body);font-size:13px;padding:11px 14px;outline:none;width:100%;transition:border-color .2s;"
                       onfocus="this.style.borderColor='var(--accent)'"
                       onblur="this.style.borderColor='rgba(255,255,255,0.06)'">
                @error('name')
                    <div style="font-size:11px;color:var(--accent2);margin-top:4px;">{{ $message }}</div>
                @enderror
            </div>

            <div style="display:flex;justify-content:flex-end;gap:12px;">
                <a href="{{ route('categoria.index') }}" style="display:inline-flex;align-items:center;gap:6px;background:transparent;border:1px solid var(--border);color:var(--text-sec);font-family:var(--font-body);font-size:13px;font-weight:600;padding:11px 22px;border-radius:10px;text-decoration:none;">
                    <i class="fas fa-times"></i> Cancelar
                </a>
                <button type="submit" style="display:inline-flex;align-items:center;gap:8px;background:var(--accent);border:none;border-radius:10px;padding:11px 28px;font-size:13px;font-weight:700;font-family:var(--font-body);cursor:pointer;color:#000;">
                    <i class="fas fa-save"></i> Actualizar Categoría
                </button>
            </div>
        </form>
    </div>

</div>
@endsection
