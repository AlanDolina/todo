<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Todo;
use Carbon\Carbon;

class TodoController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except('show');
    }

    public function show(){
        if(Auth::check()){
            $todos = Todo::where('user_id',Auth::user()->id)
                ->orderBy('endTask', 'asc')
                ->where('isDone','0')
                ->get();
            $todaysDate = Carbon::now()->format('Y-m-d');
            return view('todo.todo',compact('todos','todaysDate'));
        }else{
            
            return view('todo.index');
        }
    }

    public function store(){
        $this->validate(request(),[
            'importance' => 'required',
            'body' => 'required',
            'endTask' => 'required|after_or_equal:today'
        ]);

        auth()->user()->publish(
            new Todo(request(['importance','body','endTask']))
        );
        return redirect('/');
    }

    public function edit(Todo $todo){
        return view('todo.todoEdit',compact('todo'));
    }

    public function update(Todo $todo){
        $this->validate(request(),[
            'body' => 'required',
            'endTask' => 'required|after_or_equal:today'
        ]);

        Todo::where('id',$todo->id)->update([
            'body' => request('body'),
            'endTask' => request('endTask')
        ]);

        return redirect('/');
    }

    public function destroy(Todo $todo){
        Todo::destroy($todo->id);
        return redirect('/');
    }

    public function done(Todo $todo){
        Todo::where('id',$todo->id)->update([
            'isDone' => '1'
        ]);
        return redirect('/');
    }

    public function showhis(){
        if(Auth::check()){
            $todos = Todo::where('user_id',Auth::user()->id)
                ->orderBy('endTask','desc')
                ->where('isDone','1')
                ->get();
            return view('todo.todoHis',compact('todos'));
        }
    }

    public function undone(Todo $todo){
        Todo::where('id',$todo->id)->update([
            'isDone' => '0'
        ]);
        return redirect('/todo/his');
    }
}
