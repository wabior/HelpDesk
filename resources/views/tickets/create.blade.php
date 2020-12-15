@extends('layouts.menu')

@section('content')

    <div class="row m-auto">

        <div class="col col-md-7 col-lg-5 m-auto">

    <h1>Nowe zgłoszenie</h1>
    <form action="{{ url('/tickets') }}" method="POST">
            @csrf
        <div class="form-group">
            <label for="title">Temat:</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Temat">
        </div>
        <div class="form-group">
            <label for="message">Treść wiadomośći:</label>
            <textarea class="form-control" id="message" name="message" rows="3"></textarea>
        </div>
        <div class="form-group text-center">
        <input type="hidden" value="{{$user_id}}" name="user_id">
            <button type="submit" class="btn btn-primary">Wyślij</button>
        </div>
    </form>

</div>

</div>

@endsection('content')
