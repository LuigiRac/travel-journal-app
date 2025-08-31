@extends('layouts.posts')
@section('title', 'Posts')

@section('content')
<h2 class="travel-heading mb-4">I Miei Viaggi</h2>
<div class="container">

    <div class="row">
        @foreach($posts as $post)
            <a href="{{ route('posts.show', $post->id) }}" class="text-decoration-none text-dark col-md-4 mb-4">
                <div class="travel-card">
                    <div class="travel-card-body">
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->location }}" class="travel-card-image">

                        <h5 class="travel-card-title">{{ $post->location }}</h5>
                        <p class="travel-card-description">{{ $post->description }}</p>
                        <p class="travel-card-price"><strong>Prezzo:</strong> {{ $post->cost }} €</p>
                        {{-- <p class="travel-card-tags"><strong>Tags:</strong> {{ $post->tags }}</p> --}}
                    </div>
                </div>
            </a>
        @endforeach
    </div>

    <div class="text-center mt-4">
        <a class="btn" style="background-color: #198753; color: white;"  href="{{ route('posts.create') }}">Aggiungi una nuova avventura</a>
    </div>
</div>
@endsection
