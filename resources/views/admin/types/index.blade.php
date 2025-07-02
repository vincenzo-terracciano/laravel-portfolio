@extends('layouts.admin')

@section('content')

    <h2>Tipologie di progetto</h2>

    <div class="my-4">
        <a class="btn btn-success" href="{{ route("types.create") }}">Nuova tipologia</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th class="d-flex justify-content-center">Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($types as $type)
                <tr>
                    <td> {{ $type->name }} </td>
                    <td class="d-flex justify-content-center gap-2">
                        <a href="{{ route('types.show', $type->id) }}" class="btn btn-primary btn-sm">
                            Visualizza
                        </a>
                        <a href="{{ route('types.edit', $type->id) }}" class="btn btn-warning btn-sm">
                            Modifica
                        </a>
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModalLabel{{ $type->id }}">
                            Elimina
                        </button>
                
                        <!-- Modal -->
                        <div class="modal fade" id="deleteModalLabel{{ $type->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $type->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-center">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="deleteModalLabel{{ $type->id }}">Elimina il progetto</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Vuoi eliminare la tipologia?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                                        <form action="{{ route("types.destroy", $type->id) }}" method="POST">
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