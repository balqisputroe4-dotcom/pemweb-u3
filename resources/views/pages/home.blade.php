@extends('layouts.app')
@section('title', 'Home')
@section('content')
<section class="card">
    <h2 style="margin-top: 0;">Portal Berita Sederhana</h2>
    <p>
        Selamat datang di portal berita sederhana berbasis Laravel.
        Berita di bawah ini diambil dari tabel <code>articles</code>.
    </p>
    @guest
        <p class="muted" style="margin-bottom: 0;">
            Kamu belum login. Untuk mengelola berita, silakan
            <a href="{{ route('login') }}">Login</a> atau
            <a href="{{ route('register') }}">Register</a>.
        </p>
    @endguest
    @auth
        <p class="muted" style="margin-bottom: 0;">
            Kamu login sebagai <strong>{{ auth()->user()->name }}</strong>.
            Kamu dapat mengelola berita di menu <a href="{{ route('articles.index') }}">Artikel</a>.
        </p>
    @endauth
</section>

<section class="card" style="margin-top: 1rem;">
    <h3 style="margin-top: 0;">Berita Terbaru</h3>
    @if ($articles->isNotEmpty())
        <div class="row">
            @foreach ($articles as $article)
                <article class="card" style="padding: 1rem;">
                    <img src="{{ $article->image_url }}"
                         alt="Gambar {{ $article->title }}"
                         style="width: 100%; height: 160px; object-fit: cover; border-radius: 8px; margin-bottom: 0.75rem;">
                    <h4 style="margin: 0 0 0.35rem 0;">
                        <a href="{{ route('articles.show', $article) }}" style="text-decoration: none; color: inherit;">
                            {{ $article->title }}
                        </a>
                    </h4>
                    <p class="muted" style="margin: 0 0 0.6rem 0; font-size: 0.875rem;">
                        {{ $article->created_at->format('d M Y') }} &bull; {{ $article->user->name }}
                    </p>
                    <p style="margin: 0 0 0.75rem 0;">
                        {{ \Illuminate\Support\Str::limit($article->body, 130) }}
                    </p>
                    <a href="{{ route('articles.show', $article) }}">Baca selengkapnya &rarr;</a>
                </article>
            @endforeach
        </div>
    @else
        <p class="muted" style="margin-bottom: 0;">
            Belum ada berita yang tersedia.
            @auth
                Silakan buat berita baru di menu <a href="{{ route('articles.create') }}">Tambah Artikel</a>.
            @endauth
        </p>
    @endif
</section>
@endsection