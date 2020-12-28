@extends('layouts.menu')

@section('content')


    <div class="row mt-3">

        <div class="col-12 col-md-6">
            <label>Szczegóły zgłoszenia</label>
            <div class="card bg-light">
                <div class="card-body py-2 border">
                    <span>Id: <strong>{{ $ticket->id }}</strong></span>
                    <span class="float-right">Utworzono: {{ $ticket->created_at }}</span> </div>
                <div class="card-header"> {{ $ticket->user->name}}  {{$ticket->user->surname }}</div>
                <div class="card-body">
                  <h5 class="card-title">{{ $ticket->title }}</h5>
                  <p class="card-text my-4">{{ $ticket->message }}</p>
                  <form method="POST" action=" {{ url('/tickets/update/') }} ">
                    {{csrf_field()}}
                    {{ method_field('PATCH') }}
                    <button type="submit" class="btn btn-secondary w-100">Zamknij zgłoszenie</button>
                    <input type="hidden" name="id" value="{{ $ticket->id }}">
                    <input type="hidden" name="status_id" value="4">

                </form>
                </div>
            </div>

        </div>

        <div class="col-12 col-md-6">
            <label for="notes_list">Lista notatek:</label>
            <ul class="list-group">

                @if (!empty($notes[0]))
                {{-- {{ dd($notes)}} --}}

                    @foreach ($notes as $note)

                        <li class="list-group-item" id="notes_list" name="notes_list">{{ $note->note }}</li>

                    @endforeach

                @else

                    <li class="list-group-item" id="notes" name="notes">brak notatek</li>

                @endif

        </div>

    </div>







@endsection
