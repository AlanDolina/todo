@extends('layouts.layout')

@section('content')

@include('todo.todoCreate')

@php $countTask=0; @endphp

<div class="col-sm-8">
    <div class="container">
        <h1>Twoje zadania</h1>
        @if($countTodo = count($todos))
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
                        <div class="col-sm-6">
                            <li style="list-style: none">
                                <div>
                                    <h5>Zadanie nr: {{$countTask+=1}}</h5> 
                                    {{$todo->body}} <br>
                                    do zrobienia do:
                                    {{$todo->endTask->toFormattedDateString()}}
                                    <a href="/todo/{{$todo->id}}/edit">Edytuj</a> 
                                    <a href="/todo/{{$todo->id}}/delete" class="deleteLink">Usuń</a>
                                </div>
                            </li>
                        </div>

                        <div class="col-sm-4">
                                    @php $daysLeft = $todo->endTask->diffInDays($todaysDate) @endphp
                                    @if($todo->endTask->gte($todaysDate))
                                        @if ($daysLeft == 1)
                                            Do wykonania zadania został <b>{{$daysLeft}}</b> dzień
                                        @else
                                            Do wykonania zadania zostało <b>{{$daysLeft}}</b> dni
                                        @endif
                                    @else
                                        @if ($daysLeft == 1)
                                            Zadanie powinno być wykonane <b>{{$daysLeft}}</b> dzień temu
                                        @else
                                            Zadanie powinno być wykonane <b>{{$daysLeft}}</b> dni temu
                                        @endif
                                    @endif
                        </div>

                        <div class="col-sm-2 zrobione">
                            <a href="/todo/{{$todo->id}}/done" class="align-middle"><i class="fas fa-check-square"></i></a>
                        </div>
                    </div>
                @endforeach
            </ul>
        @else
            <div class="row alert alert-info">
                <div class="col-sm-10">
                    Nie masz nic do zrobienia, ciesz się wolnym czasem :)
                </div>
            </div>
        @endif
    </div>
</div>
@endsection