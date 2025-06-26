@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="mb-4">Profilo</h1>

        <div class="card">
            <div class="card-body">
                <p><strong>Nome:</strong> {{ $user->name }} </p>
                <p><strong>Email:</strong> {{ $user->email }} </p>
            </div>
        </div>
    </div>
@endsection