@extends('layouts.admin')

@section('content')

    <h1>Modifica tecnologia</h1>

    <form action="{{ route("technologies.update", $technology->id) }}" method="post" class="my-4">

        @csrf

        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nome Tecnologia</label>
            <input
                type="text"
                name="name"
                id="name"
                class="form-control"
                value="{{ $technology->name }}"
            />
        </div>
    
        <div class="mb-3">
            <label for="color" class="form-label">Colore</label>
            <input
                type="color"
                name="color"
                id="color"
                class="form-control form-control-color"
                value="{{ $technology->color }}"
            />
        </div>

        <div class="d-flex gap-3 my-4">
            <a class="btn btn-primary" href="{{ route("technologies.index") }}">Torna all'elenco</a>
            <input class="btn btn-success" type="submit" value="Salva">
        </div>
        
    </form>
@endsection