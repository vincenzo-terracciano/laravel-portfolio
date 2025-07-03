@extends('layouts.admin')

@section('content')
    
<div class="container">
    <h1 class="mt-4">Le mie tecnologie</h1>

    <div class="my-4">
        <a class="btn btn-success" href="{{ route("technologies.create") }}">Aggiungi una nuova tecnologia</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th class="d-flex justify-content-center">Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($technologies as $technology)
                <tr>
                    <td> {{ $technology->name }} </td>
                    <td class="d-flex justify-content-center gap-2">
                        <a href="{{ route('technologies.show', $technology->id) }}" class="btn btn-primary btn-sm">
                            Visualizza
                        </a>
                        <a href="{{ route('technologies.edit', $technology->id) }}" class="btn btn-warning btn-sm">
                            Modifica
                        </a>
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModalLabel{{ $technology->id }}">
                            Elimina
                        </button>
                
                        <!-- Modal -->
                        <div class="modal fade" id="deleteModalLabel{{ $technology->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $technology->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-center">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="deleteModalLabel{{ $technology->id }}">Elimina</h1>
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
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection