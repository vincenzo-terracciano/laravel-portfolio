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

    <a href="{{ route('projects.index') }}" class="btn btn-primary mt-3">Torna all'elenco</a>
@endsection