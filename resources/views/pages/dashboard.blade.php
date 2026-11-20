@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<section class="card">
    <h2 style="margin-top: 0;">Dashboard</h2>
    <p style="margin-bottom: 0.25rem;">Selamat datang, <strong>{{ $user->name }}</strong> ({{ $user->email }})</p>
    <p class="muted" style="margin-bottom: 0;">Ringkasan aktivitas artikel di aplikasi kamu.</p>
</section>

<section class="row" style="margin-top: 1rem;">
    <div class="card">
        <h3 style="margin-top: 0;">Total Artikel</h3>
        <p style="font-size: 2rem; font-weight: 700; margin: 0.25rem 0;">{{ $totalArticles }}</p>
        <p class="muted" style="margin-bottom: 0;">Jumlah seluruh artikel di sistem.</p>
    </div>
    <div class="card">
        <h3 style="margin-top: 0;">Artikel Kamu</h3>
        <p style="font-size: 2rem; font-weight: 700; margin: 0.25rem 0;">{{ $myArticles }}</p>
        <p class="muted" style="margin-bottom: 0;">Artikel yang dibuat akun kamu.</p>
    </div>
    <div class="card">
        <h3 style="margin-top: 0;">Aksi Cepat</h3>
        <div style="display: flex; flex-direction: column; gap: 0.5rem;">
            <a href="{{ route('articles.create') }}" class="btn">+ Tambah Artikel Baru</a>
            <a href="{{ route('articles.index') }}" class="btn btn-secondary">Kelola Artikel</a>
            <a href="{{ route('home') }}" class="btn btn-secondary">Lihat Halaman Home</a>
        </div>
    </div>
</section>

<section class="card" style="margin-top: 1rem;">
    <h3 style="margin-top: 0;">Artikel Terbaru</h3>
    @if ($latestArticles->isNotEmpty())
        <div class="row">
            @foreach ($latestArticles as $article)
                <article class="card" style="padding: 1rem;">
                    <div style="display: flex; gap: 0.85rem; align-items: center;">
                        <img src="{{ $article->image_url }}"
                             alt="Thumbnail {{ $article->title }}"
                             style="width: 96px; height: 72px; object-fit: cover; border-radius: 8px; flex-shrink: 0;">
                        <div>
                            <h4 style="margin: 0 0 0.25rem 0;">
                                <a href="{{ route('articles.show', $article) }}" style="text-decoration: none; color: inherit;">
                                    {{ $article->title }}
                                </a>
                            </h4>
                            <p class="muted" style="margin: 0; font-size: 0.85rem;">
                                {{ $article->user->name }} &bull; {{ $article->created_at->format('d M Y') }}
                            </p>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    @else
        <p class="muted" style="margin-bottom: 0;">Belum ada artikel yang bisa ditampilkan.</p>
    @endif
</section>
@endsection