@extends('layouts.admin')

@section('content')
    <h1>Benvenuto, {{ $user->name }}!</h1>
    <p>Questa è la tua area riservata, da qui potrai gestire il tuo portfolio.</p>
@endsection