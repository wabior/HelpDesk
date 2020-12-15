 <p>Status:</p>

<button class="btn btn-primary btn-block dropdown-toggle" type="button" data-toggle="dropdown">
    {{ $ticket->status->status}}
</button>

<input type="hidden" name="id" value="{{ $ticket->id }}">

<div class="dropdown-menu">

            @foreach ($statuses as $status)

                @if ($status->status === $ticket->status->status)

                    <a class="dropdown-item active" name="sss" href="">{{ $ticket->status->status}}</a>
                    <label class="ml-3"><input type="radio" name="status_id" selected value="{{ $status->id }}">{{ $status->status }}</label>
                @else
                <div class="radio">
                    <label class="ml-3"><input type="radio" name="status_id" value="{{ $status->id }}">{{ $status->status }}</label>
                </div>
                    <a class="dropdown-item" name="ss" href="">{{ $status->status }}</a>

                @endif

            @endforeach

             <button type="submit">zapisz</button>
