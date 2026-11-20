@extends('layouts.app')
@section('title', 'Tambah Artikel')
@section('content')
<section class="card">
    <h2 style="margin-top: 0;">Tambah Artikel / Berita</h2>
    <p class="muted">
        Isi formulir di bawah untuk menambahkan berita baru. Gambar menggunakan URL (opsional); jika kosong, sistem memakai gambar placeholder.
    </p>

    @if ($errors->any())
        <div class="error">
            <strong>Terjadi kesalahan:</strong>
            <ul style="margin-bottom: 0;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('articles.store') }}" method="POST">
        @csrf
        <label for="title">Judul Artikel</label>
        <input type="text" id="title" name="title" value="{{ old('title') }}" required placeholder="Masukkan judul berita">

        <label for="image">URL Gambar (opsional)</label>
        <input type="url" id="image" name="image" value="{{ old('image') }}" placeholder="https://example.com/gambar.jpg">
        <p class="muted" style="margin: 0.3rem 0 0 0; font-size: 0.85rem;">
            Jika dikosongkan, sistem memakai gambar placeholder dari <code>picsum.photos</code>.
        </p>

        <label for="body">Isi Berita</label>
        <textarea id="body" name="body" rows="8" required placeholder="Tulis isi berita di sini...">{{ old('body') }}</textarea>

        <div style="margin-top: 1.1rem; display: flex; gap: 0.5rem;">
            <button type="submit">Simpan Artikel</button>
            <a href="{{ route('articles.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</section>
@endsection