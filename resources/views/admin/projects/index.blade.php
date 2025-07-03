@extends('layouts.admin')

@section('content')
    
<div class="container">
    <h1 class="mt-4">I miei progetti</h1>

    <div class="my-4">
        <a class="btn btn-success" href="{{ route("projects.create") }}">Aggiungi un nuovo progetto</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Titolo</th>
                <th>Tipo</th>
                <th>GitHub</th>
                <th>Sito</th>
                <th>Creato il</th>
                <th>Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <td> {{ $project->title }} </td>
                    <td> {{ $project->type ? $project->type->name : '-' }} </td>
                    <td><a href="{{ $project->github_url }}" target="_blank">Repo</a></td>
                    <td><a href="{{ $project->site_url }}" target="_blank">Sito</a></td>
                    <td> {{ $project->created_at->format('y/m/Y') }} </td>
                    <td>
                        <a href="{{ route('projects.show', $project->id) }}" class="btn btn-primary btn-sm">
                            Visualizza
                        </a>
                        <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning btn-sm">
                            Modifica
                        </a>
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModalLabel{{ $project->id }}">
                            Elimina
                        </button>
                
                        <!-- Modal -->
                        <div class="modal fade" id="deleteModalLabel{{ $project->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $project->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-center">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="deleteModalLabel{{ $project->id }}">Elimina il progetto</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Vuoi eliminare il progetto?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                                        <form action="{{ route("projects.destroy", $project->id) }}" method="POST">
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