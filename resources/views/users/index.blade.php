@extends('layouts.menu')

@section('content')

    <h1>Lista użytkowników:</h1>

    <ul class="list-group">



    @foreach($users as $user)

        <li class="list-group-item">

            {{$user->name}} {{$user->surname}}

        </li>

    @endforeach

    </ul>

@endsection
