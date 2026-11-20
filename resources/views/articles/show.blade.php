@extends('layouts.app')
@section('title', $article->title)
@section('content')
<section class="card">
    <h2 style="margin-top: 0;">{{ $article->title }}</h2>
    <p class="muted" style="margin-top: 0.25rem;">
        Dipublikasikan pada {{ $article->created_at->format('d M Y') }} oleh {{ $article->user->name }}
    </p>
    <div style="margin: 1rem 0;">
        <img src="{{ $article->image_url }}"
             alt="Gambar untuk {{ $article->title }}"
             style="width: 100%; max-height: 340px; object-fit: cover; border-radius: 10px;">
    </div>
    <div style="margin-top: 1rem;">
        {!! nl2br(e($article->body)) !!}
    </div>
    <div style="margin-top: 1.5rem; display: flex; gap: 0.5rem; flex-wrap: wrap;">
        <a href="{{ route('home') }}" class="btn btn-secondary">&larr; Kembali ke Home</a>
        <a href="{{ route('articles.index') }}" class="btn btn-secondary">Lihat semua artikel</a>
        @auth
            @if ($article->user_id === auth()->id())
                <a href="{{ route('articles.edit', $article) }}" class="btn">Edit</a>
            @endif
        @endauth
    </div>
</section>
@endsection