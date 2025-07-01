@extends('layouts.admin')

@section('content')
    
<div class="container">
    <h1 class="my-5">I miei progetti</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Titolo</th>
                <th>Tecnologie</th>
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
                    <td> {{ $project->technologies }} </td>
                    <td><a href="{{ $project->github_url }}" target="_blank">Repo</a></td>
                    <td><a href="{{ $project->site_url }}" target="_blank">Sito</a></td>
                    <td> {{ $project->created_at->format('y/m/Y') }} </td>
                    <td>
                        <a href="{{ route('projects.show', $project->id) }}" class="btn btn-primary btn-sm">
                            Visualizza
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection