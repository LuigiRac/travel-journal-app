@extends('layouts.posts')

    
@section('content')

<div class="container mt-5">
    <div class="row d-flex align-items-stretch">
        
        <div class="col-md-6 mb-4">
            <div class="card h-100"> <div class="card-header card-header-color">
                    {{$post->location}}
                </div>
                <div class="card-body">
                    <h5 class="card-title">Prezzo: {{$post->cost}} €</h5>
                    <p class="card-text">{{$post->description}}</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Pro:</strong> {{$post->positive}}</li>
                    <li class="list-group-item"><strong>Contro:</strong> {{$post->negative}}</li>
                    <li class="list-group-item"><strong>Impegno fisico:</strong> {{$post->physical_effort}}</li>
                    <li class="list-group-item"><strong>Effort Economico:</strong> {{$post->economic_effort}}</li>

                </ul>

                <div class="card-body d-flex justify-content-between align-items-center ">

                     {{-- FRECCIA INDIETRO --}}
                    @if ($previousPostId)
                        <a href="{{ route('posts.show', $previousPostId) }}" class="btn btn-success">
                            <i class="bi bi-arrow-left"></i>
                        </a>
                    @else
                        <button class="btn btn-outline-secondary button-mod" disabled>
                             <i class="bi bi-arrow-left"></i>
                        </button>
                    @endif

                    {{-- BOTTONI MODIFICA ED ELIMINA --}}
                    <div>
                        <a href="{{route('posts.edit', $post)}}" class="btn btn-primary me-2">Modifica</a>
                        <button type="button" class="btn btn-danger " data-bs-toggle="modal" data-bs-target="#exampleModal">Elimina
                        </button>
                    </div>
                    
                    {{-- FRECCIA AVANTI--}}
                    @if ($nextPostId)
                        <a href="{{ route('posts.show', $nextPostId) }}" class="btn btn-success">
                             <i class="bi bi-arrow-right "></i>
                        </a>
                    @else
                        <button class="btn btn-outline-secondary" disabled>
                             <i class="bi bi-arrow-right "></i>
                        </button>
                    @endif
                </div>
                
            </div>
        </div>

        {{-- IMMAGINE --}}
        <div class="col-md-4 col-sm-6 mb-4 d-flex justify-content-center align-items-start">
            @if ($post->image)
                <div class="card">
                   <img src="{{ asset('storage/' . $post->image) }}" alt="image" class="img-fluid img-mod">
                </div>
            @endif
        </div>

    </div>
</div>


{{-- TASTI AGGIUNTA E HOME --}}
<div class="container text-center d-flex py-4 gap-3">
    <div class="d-flex flex-column  gap-3 ">
        <a class="btn btn-primary" href="{{route('posts.create')}}">Aggiungi una nuova avventura</a>
        <a class="btn btn-success" href="{{route('posts.index', $post)}}">I miei Viaggi</a>
    </div>
   
{{-- MODAL --}}
   <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <h1 class="modal-title fs-5" id="exampleModalLabel">Elimina definitivamente?</h1>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               Sei sicuro di voler eliminare questo viaggio?
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Annulla</button>

               <form action="{{route('posts.destroy', $post)}}" method="POST">
                  @csrf
                  @method('DELETE')
                  <input type="submit" class="btn btn-danger " value="Elimina">
               </form>
            </div>
         </div>
      </div>
   </div>

</div>

@endsection