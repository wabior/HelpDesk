@extends('layouts.menu')

@section('content')

<div class="w-50 m-auto">
    <h2 class="mt-5 mb-4">Utworzyłeś zgłoszenie o id: {{ $created_ticket->id }}</h2>

    <div class="card bg-light mb-3">
        <div class="card-header">Zgłaszający: {{ $created_ticket->user->name}}  {{$created_ticket->user->surname }}</div>
        <div class="card-body">
            <h5 class="card-title">{{ $created_ticket->title }}</h5>
            <p class="card-text">{{ $created_ticket->message }}</p>

        </div>

        <div class="card-footer text-muted">
            Data zgłoszenia: {{ $created_ticket->created_at }}
            <a href="{{ action('TicketController@index') }}" class="btn btn-secondary float-right">Potwierdzam</a>
        </div>
    </div>

</div>

@endsection('content')


