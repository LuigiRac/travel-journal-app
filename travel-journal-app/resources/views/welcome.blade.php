@extends('layouts.posts')
@section('content')

<div class="jumbotron p-5 mb-4 bg-light rounded-3">
    <div class="container py-5">
        <div class="logo_laravel">
            <link rel="icon" href="{{ asset('storage/logo/logo.png') }}">
        </div>
        <h1 class="display-5 fw-bold">
            Benvenuti nel mio portale viaggi <i class="bi bi-airplane-engines"></i></i>
        </h1>

        
        <a href="{{route('posts.index')}}" class="btn btn-primary btn-lg" type="button">I miei Viaggi</a>
    </div>
</div>


@endsection