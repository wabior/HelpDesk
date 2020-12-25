@extends('layouts.menu')

@section('content')

    <h2 class="mb-3 ml-1">Lista zgłoszeń:</h2>

    <div class="row mt-1 mb-1 ml-1 d-none d-lg-flex">

        <div class="col-2 col-md-1 text-center">

            ID

        </div>

                {{-- tytuł --}}
        <div class="col-10 col-md-3">

            Tytuł

        </div>

                {{-- user name --}}
        <div class="col-6  col-md-2">

            Zgłaszający

        </div>

        <div class="col-6 col-md-3 col-lg-2">

            Zgłoszono

        </div>

            <div class="col-6 col-md-2">

              Status

            </div>

            <div class="-6 col-md-2">


            </div>

    </div>



        {{-- lista zgłoszeń --}}
    @foreach ($tickets as $ticket)

    <div class="row mt-1 mb-1 ml-1">

        <div class="list-group col-2 col-md-1">

            <span class="list-group-item list-group-item-action p-2  text-center">

                {{ $ticket->id }}

            </span>

        </div>

                {{-- tytuł --}}
        <div class="list-group col-10 col-md-3 ">

            <a href="#" class="list-group-item list-group-item-action p-2 pl-3">

                {{ Str::limit($ticket->title, 30) }}

            </a>

        </div>

                {{-- user name --}}
        <div class="list-group col-6  col-md-2">

            <a href="#" class="list-group-item list-group-item-action p-2 pl-3">

                {{ $ticket->user->name }}  {{ $ticket->user->surname }}

            </a>

        </div>

        <div class="list-group col-6 col-md-3 col-lg-2">

            <p class="list-group-item p-2 pl-3

            @if (($ticket->created_at->diffInHours() >= 48)

                and

                ($ticket->status->id == '1'))

                text-danger font-weight-bold @endif ">

                {{-- {{ $ticket->created_at->format('d.m.y') }}

                {{ $ticket->created_at->format('h:i') }} --}}

                {{ $ticket->created_at->diffForHumans() }}


            </p>

        </div>

            <div class="list-group col-6 col-md-2">

                <p class="list-group-item text-center p-2
                    @if ($ticket->status->id == '1') list-group-item-warning font-weight-bold
                    @elseif ($ticket->status->status == 'Zakończone') list-group-item-success
                    @endif "> {{ $ticket->status->status }} </p>

            </div>

            <div class="list-group col-6 col-md-2">

                <a href='{{ url("tickets/$ticket->id") }}' class="list-group-item list-group-item-action text-center p-2 ">szczegóły</a>

            </div>

    </div>

    @endforeach

@endsection

