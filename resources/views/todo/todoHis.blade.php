@extends('layouts.layout')

@section('content')

@include('todo.todoCreate')

<div class="col-sm-8">
    <div class="container">
        <h1>Historia twoich zadań</h1>
            <ul>
                @foreach($todos as $todo)
                    @php
                        switch($todo->importance){
                            case 1: $todoStyle = "info"; break;
                            case 2: $todoStyle = "warning"; break;
                            case 3: $todoStyle = "danger"; break;
                        }
                    @endphp
                    <div class="row alert alert-{{$todoStyle}}">
                        <div class="col-sm-10">
                            <li style="list-style: none">
                                <div>
                                    {{$todo->body}} <br>
                                    do zrobienia do:
                                    {{$todo->endTask->toFormattedDateString()}}
                                    <a href="/todo/{{$todo->id}}/edit">Edytuj</a> 
                                    <a href="/todo/{{$todo->id}}/delete" class="deleteLink">Usuń</a>
                                </div>
                            </li>
                        </div>
                        <div class="col-sm-2 zrobione">
                            <a href="/todo/{{$todo->id}}/undone"><i class="far fa-square"></i></a>
                        </div>
                    </div>
                @endforeach
            </ul>
    </div>
</div>

@endsection