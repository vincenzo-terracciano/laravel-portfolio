@extends('layouts.admin')

@section('content')

    <h1>Modifica un progetto</h1>

    <form action="{{ route("projects.update", $project->id) }}" method="post" class="my-4">

        @csrf

        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input
                type="text"
                class="form-control"
                name="title"
                id="title"
                value="{{ $project->title }}"
            />
        </div>

        <div class="mb-3">
            <label for="type_id" class="form-label">Tipo</label>
            <select name="type_id" id="type_id" class="form-select">
                <option value="">Nessun tipo</option>
                @foreach ($types as $type)
                    <option value="{{ $type->id }}" {{ $project->type_id == $type->id ? 'selected' : '' }}>
                        {{ $type->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <input
                type="text"
                class="form-control"
                name="description"
                id="description"
                value="{{ $project->description }}"
            />
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Immagine</label>
            <input
                type="url"
                class="form-control"
                name="image"
                id="image"
                value="{{ $project->image }}"
            />
        </div>

        <div class="mb-3">
            <label for="technologies" class="form-label">Tecnologie utilizzate</label>
            <input
                type="text"
                class="form-control"
                name="technologies"
                id="technologies"
                value="{{ $project->technologies }}"
            />
        </div>

        <div class="mb-3">
            <label for="github_url" class="form-label">Link Repo GitHub</label>
            <input
                type="url"
                class="form-control"
                name="github_url"
                id="github_url"
                value="{{ $project->github_url }}"
            />
        </div>

        <div class="mb-3">
            <label for="site_url" class="form-label">Link Sito Progetto</label>
            <input
                type="url"
                class="form-control"
                name="site_url"
                id="site_url"
                value="{{ $project->site_url }}"
            />
        </div>

        <div class="d-flex gap-3 my-4">
            <a class="btn btn-primary" href="{{ route("projects.index") }}">Torna all'elenco</a>
            <input class="btn btn-success" type="submit" value="Salva">
        </div>
        
    </form>
@endsection