@extends('layouts.admin')

@section('content')
    
<h1 class="mb-4"> {{ $technology->name }} </h1>

<p>
    <strong>Colore:</strong>
    <span class="badge" style="background-color: {{ $technology->color }}">
        {{ $technology->name }}
    </span>
</p>
    
<div class="d-flex gap-3 align-items-center py-4">
    <a href="{{ route('technologies.index') }}" class="btn btn-primary">Torna all'elenco</a>

    <a class="btn btn-warning" href="{{ route('technologies.edit', $technology->id) }}">Modifica</a>

    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Elimina
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-center">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Elimina</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Vuoi eliminare la tecnologia?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                    <form action="{{ route("technologies.destroy", $technology->id) }}" method="POST">
                        @csrf

                        @method("DELETE")
                        <input type="submit" value="Elimina" class="btn btn-danger">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection