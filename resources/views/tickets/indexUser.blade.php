@extends('layouts.menu')

@section('content')

    <h2 class="mb-3 ml-1">Twoje zgłoszenia:</h2>

    @foreach ($tickets as $ticket)


    <div class="row mt-1 mb-2 ml-1">

        <div class="list-group col-2 col-md-1">

            <span class="list-group-item list-group-item-action p-2 pl-3">

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

            <p class="list-group-item p-2 pl-3">

                {{ $ticket->created_at->format('d.m.y') }}

                {{ $ticket->created_at->format('h:i') }}

            </p>

        </div>

            <div class="list-group col-6 col-md-2">

                <p class="list-group-item text-center p-2
                    @if ($ticket->status->id == '1') list-group-item-warning font-weight-bold
                    @elseif ($ticket->status->status == 'Zakończone') list-group-item-success
                    @endif "> {{ $ticket->status->status }} </p>

            </div>

            <div class="list-group col-6 col-md-2 ">

                <a href='{{ url("tickets/$ticket->id") }}' class="list-group-item list-group-item-action text-center p-2">szczegóły</a>


            </div>

    </div>

    @endforeach

@endsection

