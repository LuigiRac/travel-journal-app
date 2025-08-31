@extends('layouts.posts')   
@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">Modifica la tua Avventura</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('posts.update', $post)}}" method="POST" enctype="multipart/form-data"> 
                        @csrf 
                        @method('PUT')

                        {{-- LUOGO --}}
                        <div class="mb-3">
                            <label for="location" class="form-label">Luogo: </label>
                            <input type="text" class="form-control" id="location" name="location" value="{{$post->location}}" required>
                        </div>

                        {{-- DESCRIZIONE --}}
                        <div class="mb-3">
                            <label for="description" class="form-label">Descrizione: </label>
                            <input type="text" class="form-control" id="description" name="description" value="{{$post->description}}"  required>
                        </div>

                        {{-- PRO --}}
                        <div class="mb-3">
                            <label for="positive" class="form-label">Pro: </label>
                            <textarea class="form-control" id="positive" name="positive" rows="2">{{$post->positive}}</textarea>
                        </div>

                        {{-- CONTRO --}}
                        <div class="mb-3">
                            <label for="negative" class="form-label">Contro: </label>
                            <textarea class="form-control" id="negative" name="negative" rows="2">{{$post->negative}}</textarea>
                        </div>


                        {{-- IMPEGNO FISICO --}}
                        <div class="mb-3">
                            <label for="physical_effort" class="form-label">Impegno fisico:</label>
                            <select class="form-select" id="physical_effort" name="physical_effort" required>
                                <option value="" disabled {{ old('physical_effort', $post->physical_effort ?? '') == '' ? 'selected' : '' }}>
                                    Seleziona un numero
                                </option>
                                @for ($i = 1; $i <= 5; $i++)
                                    <option value="{{ $i }}" {{ old('physical_effort', $post->physical_effort ?? '') == $i ? 'selected' : '' }}>
                                        {{ $i }}
                                    </option>
                                @endfor
                            </select>
                        </div>


                        {{-- IMPEGNO ECONOMICO --}}
                        <div class="mb-3">
                            <label for="economic_effort" class="form-label">Impegno economico:</label>
                            <select class="form-select" id="economic_effort" name="economic_effort" required>
                            <option value="" disabled {{ old('economic_effort', $post->economic_effort ?? '') == '' ? 'selected' : '' }}>
                                    Seleziona un numero
                                </option>
                                @for ($i = 1; $i <= 5; $i++)
                                    <option value="{{ $i }}" {{ old('physical_effort', $post->physical_effort ?? '') == $i ? 'selected' : '' }}>
                                        {{ $i }}
                                    </option>
                                @endfor
                            </select>
                        </div>

                        {{-- PREZZO --}}
                        <div class="mb-3">
                            <label for="cost" class="form-label">Prezzo (€): </label>
                            <input type="number" step="0.01" class="form-control" id="cost" name="cost" value="{{$post->cost}}" required>
                        </div>

                        
                        
                        {{-- IMMAGINE --}}
                        <div class="form-group mb-3">
                            <label for="image">Carica un'immagine:</label>
                            <input type="file" name="image" id="image">
                            
                            @if ($post->image)
                <div class="card h-100"> 
                    <img src="{{asset('storage/' . $post->image)}}" class="card-img-top" alt="image" >
                </div>
            @endif
                        </div>


                        <div class="d-flex justify-content-between mb-3">
                            <button type="submit" class="btn btn-success">Salva Viaggio</button>
                            <a class="btn btn-success" href="{{route('posts.index')}}">Torna alla Home</a>
                        </div> 

                         
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection