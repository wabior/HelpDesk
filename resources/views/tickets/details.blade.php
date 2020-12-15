@extends('layouts.menu')

@section('content')

    <span class="mr-4">Szczegóły zgłoszenia Id: {{ $ticket->id }}</span>

    <div class="row mt-3">

        <div class="col">

            <div class="card bg-light mb-3">
                <div class="card-header"> {{ $ticket->user->name}}  {{$ticket->user->surname }}</div>
                <div class="card-body">
                  <h5 class="card-title">{{ $ticket->title }}</h5>
                  <p class="card-text">{{ $ticket->message }}</p>
                </div>
              </div>

        </div>

        <div class="col m-2">

            <span>Utworzone:</span><span> {{ $ticket->created_at }}</span>

            <form method="POST" action=" {{ url('/tickets/update/') }} ">
                {{csrf_field()}}
                {{ method_field('PATCH') }}

                <div class="form-row justify-content-between mt-3">

                    <div class="form-row d-flex">

                        <label class="mb-0" for="status_id">Status</label>
                        <select class="form-control d-flex mr-3" id="status_id" name="status_id">

                            @foreach ($statuses as $status)

                                @if ($status->status === $ticket->status->status)

                                <option selected value="{{ $status->id }}">{{ $status->status }}</option>

                                @else

                                    <option value="{{ $status->id }}">{{ $status->status }}</option>

                                @endif

                            @endforeach

                        </select>

                    </div>

                    <div class="d-flex align-items-end">

                        <button type="submit" class="btn btn-primary">Zmień status</button>
                    </div>
              </div>

              <input type="hidden" name="id" value="{{ $ticket->id }}">

            </form>

        </div>

    </div>

    <div class="row my-3 border-top">

        <div class="col mt-3">

            <form method="POST" action=" {{ url('/notes/store') }} ">
                @csrf
                <div class="form-group">
                    <label for="note">Dodaj notatkę:</label>
                    <textarea class="form-control" id="note" name="note" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary submit">Zapisz notatkę</button>
                </div>
                <input type="hidden" name="user_id" value="{{ $user_id }}">
                <input type="hidden" name ="ticket_id" value="{{ $ticket->id }}">

            </form>

        </div>

        <div class="col mt-3">
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
