@extends('layout.app')
@section('title', 'Publicar Producto — MarketPlace UNAB')

@section('content')
<div class="create-wrap">

    <div class="breadcrumb">
        <a href="{{ route('product.index') }}"><i class="fas fa-home"></i> Inicio</a>
        <span class="sep">›</span>
        <a href="{{ route('product.index') }}">Productos</a>
        <span class="sep">›</span>
        <span>Nuevo Producto</span>
    </div>

    <div class="page-hdr">
        <div class="eyebrow">Nuevo listado</div>
        <h1>Publicar Producto</h1>
        <p>Completa los datos para publicar tu producto en el marketplace.</p>
    </div>

    @if(session('success'))
    <div style="background:rgba(0,255,135,0.08);border:1px solid rgba(0,255,135,0.2);color:var(--accent);padding:14px 18px;border-radius:12px;margin-bottom:24px;font-size:13px;display:flex;align-items:center;gap:10px;">
        <i class="fas fa-check-circle"></i> {{ session('success') }}
    </div>
    @endif

    @if($errors->any())
    <div style="background:rgba(255,77,109,0.08);border:1px solid rgba(255,77,109,0.2);color:var(--accent2);padding:14px 18px;border-radius:12px;margin-bottom:24px;font-size:13px;">
        <i class="fas fa-exclamation-circle"></i> <strong>Corrige los siguientes errores:</strong>
        <ul style="margin-top:8px;padding-left:16px;">
            @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
        </ul>
    </div>
    @endif

    <div class="form-card">
        <div class="form-card-hdr">
            <div class="fch-icon">📦</div>
            <div>
                <h2>Agregar Nuevo Producto</h2>
                <p>Completa todos los campos para publicar en el marketplace</p>
            </div>
        </div>

        <form id="product-form" action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-section">
                <div class="section-label">Información del Producto</div>
                <div class="fg">
                    <label>Nombre del Producto <span class="req">*</span></label>
                    <input type="text" name="name"
                           class="fc @error('name') err @enderror"
                           value="{{ old('name') }}"
                           placeholder="Ej: MacBook Air M2 13 pulgadas"
                           maxlength="200" required>
                    <div class="hint">Sé descriptivo. Incluye características clave.</div>
                    @error('name')<div class="hint err">{{ $message }}</div>@enderror
                </div>
                <div class="fg">
                    <label>Descripción <span class="req">*</span></label>
                    <textarea name="description"
                              class="fc @error('description') err @enderror"
                              rows="5"
                              placeholder="Describe características, materiales, garantía..."
                              required>{{ old('description') }}</textarea>
                    <div class="hint">Una buena descripción aumenta las ventas.</div>
                    @error('description')<div class="hint err">{{ $message }}</div>@enderror
                </div>
            </div>

            <div class="form-section">
                <div class="section-label">Categoría y Precio</div>
                <div class="form-row2">
                    <div class="fg">
                        <label>Categoría <span class="req">*</span></label>
                        <select name="category_id"
                                class="fc @error('category_id') err @enderror" required>
                            <option value="" disabled selected>Selecciona una categoría...</option>
                            @foreach($categoryList as $category)
                                <option value="{{ $category->id }}"
                                    @selected(old('category_id') == $category->id)>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')<div class="hint err">{{ $message }}</div>@enderror
                    </div>
                    <div class="fg">
                        <label>Precio <span class="req">*</span></label>
                        <div class="price-wrap">
                            <span class="price-sym">$</span>
                            <input type="number" name="price"
                                   class="fc @error('price') err @enderror"
                                   value="{{ old('price') }}"
                                   placeholder="0.00" step="0.01" min="0" required>
                        </div>
                        <div class="hint">Precio en USD</div>
                        @error('price')<div class="hint err">{{ $message }}</div>@enderror
                    </div>
                </div>
            </div>

            <div class="form-section">
                <div class="section-label">Imagen del Producto</div>
                <div class="fg">
                    <label>Imagen <span class="opt">(Opcional)</span></label>
                    <div class="upload-zone" id="uploadZone">
                        <input type="file" name="image"
                               accept="image/jpeg,image/png,image/webp"
                               onchange="previewImg(this)">
                        <div class="upload-ico">🖼️</div>
                        <p><strong>Clic para subir</strong> o arrastra aquí</p>
                        <small>PNG, JPG, WEBP — Máx. 5MB</small>
                    </div>
                    <div class="img-prev" id="imgPrev">
                        <img id="prevImg" src="" alt="Preview">
                        <div class="ok">✅ Imagen lista para subir</div>
                    </div>
                    @error('image')<div class="hint err">{{ $message }}</div>@enderror
                </div>
            </div>

        </form>

        <div class="form-card-ftr">
            <a href="{{ route('product.index') }}" class="btn-cancel">
                <i class="fas fa-times"></i> Cancelar
            </a>
            <button type="submit" form="product-form" class="btn-submit">
                <i class="fas fa-upload"></i> Publicar Producto
            </button>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function previewImg(input) {
    const prev = document.getElementById('imgPrev');
    const img  = document.getElementById('prevImg');
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = e => { img.src = e.target.result; prev.style.display = 'block'; };
        reader.readAsDataURL(input.files[0]);
    }
}
const zone = document.getElementById('uploadZone');
zone.addEventListener('dragover', e => { e.preventDefault(); zone.style.borderColor = 'var(--accent)'; });
zone.addEventListener('dragleave', () => { zone.style.borderColor = ''; });
zone.addEventListener('drop', () => { zone.style.borderColor = ''; });
</script>
@endpush
