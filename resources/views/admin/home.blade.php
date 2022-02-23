@extends('layouts.dashboard')

@section('content')
    <h1>Ciao {{ $user->name }} {{ $id }}! Benvenuto nel tuo Dashboard</h1>

    @if ($userInfo)
        <div>Telefono: {{ $userInfo->phone}}</div>
        <div>Indirizzo: {{ $userInfo->address}}</div>
    @endif
@endsection