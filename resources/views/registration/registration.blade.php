@extends('layouts.layout')

@section('content')
<div class="col-sm-8">
    <h1>Rejestracja</h1>

    <form method="POST" action="/register">
        {{csrf_field()}}
        <div class="form-group">
            <label for="name">Imie:</label>
            <input type="text" name="name" class="form-control">
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control">
        </div>

        <div class="form-group">
            <label for="password">Hasło</label>
            <input type="password" name="password" class="form-control">
        </div>

        <div class="form-group">
            <label for="password_confirmation">Potiwerdź Hasło</label>
            <input type="password" name="password_confirmation" class="form-control">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-warning">Zarejestruj się</button>
        </div>

        @include('layouts.errors')
    
    </form>
</div>
@endsection

