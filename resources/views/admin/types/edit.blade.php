@extends('layouts.admin')

@section('content')

    <h1>Modifica tipologia</h1>

    <form action="{{ route("types.update", $type->id) }}" method="post" class="my-4">

        @csrf

        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nome Tipologia</label>
            <input
                type="text"
                name="name"
                id="name"
                class="form-control"
                value="{{ $type->name }}"
            />
        </div>

        <div class="d-flex gap-3 my-4">
            <a class="btn btn-primary" href="{{ route("types.index") }}">Torna all'elenco</a>
            <input class="btn btn-success" type="submit" value="Salva">
        </div>
        
    </form>
@endsection