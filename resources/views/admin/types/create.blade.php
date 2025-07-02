@extends('layouts.admin')

@section('content')

    <h1>Nuova tipologia</h1>

    <form action="{{ route("types.store") }}" method="post" class="my-4">

        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nome Tipologia</label>
            <input
                type="text"
                class="form-control"
                name="name"
                id="name"
                placeholder="Scrivi una nuova tipologia"
            />
        </div>

        <div class="d-flex gap-3 my-4">
            <a class="btn btn-primary" href="{{ route("types.index") }}">Torna all'elenco</a>
            <input class="btn btn-success" type="submit" value="Salva">
        </div>
        
    </form>
@endsection