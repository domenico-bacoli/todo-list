@extends('layouts/admin')

@section('content')
<div class="container container-centered">
    <div class="todo-container">
        <h1>To do List {{Auth::user()->name}}</h1>
        <ul class="todo-index">
            @foreach ($todos as $todo)
                <div class="single-todo {{$todo->is_completed ? '' : 'todo-completed'}}">
                    <li>{{$todo->title}}</li>
                    <li>{{$todo->expiration_date}}</li>
                    <button><a href="{{route('admin.todos.show', $todo->slug)}}">apri</a></button> 
                </div>   
            @endforeach
        </ul>
        <div class="button-add">
            <a href="{{route('admin.todos.create')}}"><button class="add-todo">+</button></a>   
        </div>
    </div>  
</div>


@endsection