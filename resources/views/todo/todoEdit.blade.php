@extends('layouts.layout')

@section('content')

<div class="createTodo">
    <form method="POST" action="/todo/{{$todo->id}}/edit/update">
        {{csrf_field()}}
        
        <div class="form-group">
            <label for="body">Treść zadania:</label>
            <textarea id="body" name="body" class="form-control" required>{{$todo->body}}</textarea>
        </div>

        <div class="form-group">
            <label for="endtask">Do kiedy musisz wykonać zadanie:</label><br>
            <input type="date" name="endTask" style="form-control" value="{{$todo->endTask}}">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-warning">Zaktualizuj zadanie</button>
        </div>

        @include('layouts.errors')

    </form> 

</div>
@endsection