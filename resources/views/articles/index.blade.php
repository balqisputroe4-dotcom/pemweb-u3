@extends('layouts.app')
@section('title', 'Articles')
@section('content')
<section class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; gap: 1rem; flex-wrap: wrap;">
        <h2 style="margin: 0;">Daftar Artikel</h2>
        <a href="{{ route('articles.create') }}" class="btn">+ Artikel Baru</a>
    </div>

    <form action="{{ route('articles.index') }}" method="GET" style="display: flex; gap: 0.5rem; margin-top: 1rem;">
        <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Cari judul atau isi artikel...">
        <button type="submit">Cari</button>
        @if (!empty($search))
            <a href="{{ route('articles.index') }}" class="btn btn-secondary">Reset</a>
        @endif
    </form>

    @if (session('success'))
        <div class="flash">{{ session('success') }}</div>
    @endif

    @if ($articles->isNotEmpty())
        <div style="display: flex; flex-direction: column; gap: 0.75rem; margin-top: 1rem;">
            @foreach ($articles as $article)
                <div class="card" style="padding: 0.9rem 1rem; display: flex; justify-content: space-between; align-items: center; gap: 1rem; flex-wrap: wrap;">
                    <div>
                        <a href="{{ route('articles.show', $article) }}" style="font-weight: 600; text-decoration: none; color: inherit;">
                            {{ $article->title }}
                        </a>
                        <div class="muted" style="font-size: 0.875rem;">
                            oleh {{ $article->user->name }} &bull; {{ $article->created_at->format('d M Y') }}
                        </div>
                    </div>
                    @if ($article->user_id === auth()->id())
                        <div style="display: flex; gap: 0.45rem; align-items: center;">
                            <a href="{{ route('articles.edit', $article) }}" class="btn btn-secondary" style="padding: 0.35rem 0.7rem; font-size: 0.875rem;">Edit</a>
                            <form action="{{ route('articles.destroy', $article) }}" method="POST" class="inline" onsubmit="return confirm('Hapus artikel ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-danger" style="padding: 0.35rem 0.7rem; font-size: 0.875rem;">Hapus</button>
                            </form>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
        {{ $articles->links('pagination::default') }}
    @else
        <p class="muted" style="margin-top: 1rem;">Belum ada artikel.</p>
    @endif
</section>
@endsection