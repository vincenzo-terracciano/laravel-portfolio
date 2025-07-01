@extends('layouts.admin')

@section('content')

    <h1>Aggiungi un progetto</h1>

    <form action="{{ route("projects.store") }}" method="post" class="my-4">

        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input
                type="text"
                class="form-control"
                name="title"
                id="title"
            />
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <input
                type="text"
                class="form-control"
                name="description"
                id="description"
            />
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Immagine</label>
            <input
                type="url"
                class="form-control"
                name="image"
                id="image"
            />
        </div>

        <div class="mb-3">
            <label for="technologies" class="form-label">Tecnologie utilizzate</label>
            <input
                type="text"
                class="form-control"
                name="technologies"
                id="technologies"
            />
        </div>

        <div class="mb-3">
            <label for="github_url" class="form-label">Link Repo GitHub</label>
            <input
                type="url"
                class="form-control"
                name="github_url"
                id="github_url"
            />
        </div>

        <div class="mb-3">
            <label for="site_url" class="form-label">Link Sito Progetto</label>
            <input
                type="url"
                class="form-control"
                name="site_url"
                id="site_url"
            />
        </div>

        <input type="submit" value="Salva">
        
    </form>
@endsection