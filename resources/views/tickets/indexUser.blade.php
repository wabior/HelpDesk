@extends('layouts.menu')

@section('content')

    <div class="row">

        <div class="col ml-2 ml-md-4">
            Zgłoszenia użytkownika: {{ Auth::user()->name}} {{ Auth::user()->surname }}
        </div>

    </div>

    @foreach ($tickets as $ticket)


    <div class="row mt-1 mb-2 ml-1">

                {{-- id --}}
        <div class="list-group col-2 col-xl-1 px-0  px-md-3">

            <span class="list-group-item list-group-item-action py-2  text-center">

                {{ $ticket->id }}

            </span>

        </div>


                {{-- tytuł --}}
        <div class="list-group col-10 col-md-4 col-xl-6">

            <a href="{{ url("tickets/$ticket->id") }}" class="list-group-item list-group-item-action p-2 pl-3">

                {{ Str::limit($ticket->title, 30) }}

            </a>

        </div>

                {{-- createdAt --}}
        <div class="list-group col-6 col-md-3 col-xl-2 my-0 py-0 px-0 px-md-3">

            <p class="list-group-item p-2 pl-3 mb-0">

                {{ $ticket->created_at->format('d.m.y') }}

                {{ $ticket->created_at->format('h:i') }}

            </p>

        </div>

            <div class="list-group col-6 col-md-3 col-xl-2 my-0  px-md-3">

                <p class="list-group-item text-center p-2
                    @if ($ticket->status->id == '1') list-group-item-warning font-weight-bold
                    @elseif ($ticket->status->status == 'Zakończone') list-group-item-success
                    @endif "> {{ $ticket->status->status }} </p>

            </div>

    </div>

    @endforeach

@endsection

