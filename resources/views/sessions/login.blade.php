@extends('layouts.layout')

@section('content')

<div class="col-sm-8">
    <h1>Logowanie</h1>

    <form method="POST" action="/login">
        {{csrf_field()}}

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control">
        </div>

        <div class="form-group">
            <label for="password">Hasło</label>
            <input type="password" name="password" class="form-control">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-warning">Zaloguj się</button>
        </div>

        @include('layouts.errors')
    
    </form>
</div>
@endsection

