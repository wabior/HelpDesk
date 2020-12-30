@extends('layouts.menu')

@section('content')

        <div class=" ml-2 ml-md-4 p-3">
            Zgłoszenia użytkownika: {{ Auth::user()->name}} {{ Auth::user()->surname }}
        </div>


    @if (!empty($tickets[0]))

            {{-- labels for columns --}}
        <div class="row mt-1 mb-0 ml-1 d-none d-xl-flex">

            <label class="col-2 col-xl-1 px-0 px-md-3  text-center"> Id </label>
            <label class="col-10 col-md-4 col-xl-6">Tytuł</label>
            <label class="col-6 col-md-3 col-xl-2 ml-md-3">Utworzono</label>
            <label class="col-6 col-md-3 col-xl-2">Status</label>
        </div>



    @foreach ($tickets as $ticket)

    <div class="row mt-0 mb-0 ml-1" name="id">

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
                {{-- status --}}
            <div class="list-group col-6 col-md-3 col-xl-2 my-0  px-md-3">

                <p class="list-group-item text-center p-2
                    @if ($ticket->status->id == '1') list-group-item-warning font-weight-bold
                    @elseif ($ticket->status->status == 'Zakończone') list-group-item-success
                    @endif "> {{ $ticket->status->status }} </p>

            </div>

    </div>

    @endforeach

    @else

    <div class="bg-info ml-2 ml-md-4 p-3">Nie masz żadnych zgłoszeń.</div>

    @endif

@endsection

