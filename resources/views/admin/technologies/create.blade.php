@extends('layouts.admin')

@section('content')

    <h1>Nuova tecnologia</h1>

    <form action="{{ route("technologies.store") }}" method="post" class="my-4">

        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nome Tecnologia</label>
            <input
                type="text"
                class="form-control"
                name="name"
                id="name"
                placeholder="Scrivi una nuova tipologia"
            />
        </div>

        <div class="mb-3">
            <label for="color" class="form-label">Colore</label>
            <input type="color" name="color" id="color" class="form-control form-control-color"
                value="{{ old('color', $technology->color ?? '#999999') }}">
        </div>

        <div class="d-flex gap-3 my-4">
            <a class="btn btn-primary" href="{{ route("technologies.index") }}">Torna all'elenco</a>
            <input class="btn btn-success" type="submit" value="Salva">
        </div>
        
    </form>
@endsection