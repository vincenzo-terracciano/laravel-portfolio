@extends('layouts.admin')

@section('content')


    <h1> {{ $project->title }} </h1>
    
    <div class="image my-4">
        <img src="{{ $project->image }}" alt="{{ $project->title }}" class="img-fluid rounded">
    </div>

    <h5>Descrizione</h5>
    <p> {{ $project->description }} </p>

    <p><strong>Tecnologie utilizzate:</strong> {{ $project->technologies }} </p>

    <p>
        <strong>GitHub:</strong>
        <a href="{{ $project->github_url }}" target="_blank">{{ $project->github_url }}</a> 
    </p>
    <p>
        <strong>Sito online:</strong>
        <a href="{{ $project->site_url }}" target="_blank">{{ $project->site_url }}</a> 
    </p>

    <p class="text-muted">Creato il: {{ $project->created_at->format('d/m/Y') }}</p>
    
    <div class="d-flex gap-3 align-items-center py-4">
        <a href="{{ route('projects.index') }}" class="btn btn-primary">Torna all'elenco</a>

        <a class="btn btn-warning" href="{{ route('projects.edit', $project->id) }}">Modifica</a>

        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Elimina
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-center">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Elimina il progetto</h1>
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
    </div>

@endsection