@extends('layouts/admin')

@section('content')
<div class="container container-centered">
    <div class="todo-container">
        <h1>To do List {{Auth::user()->name}}</h1>
        <ul class="todo-index">
            @foreach ($todos as $todo)
                <div class="single-todo {{$todo->is_completed ? '' : 'todo-completed'}}">
                    <li>{{$todo->title}}</li>
                    
                    <div class="date-button-container">
                        <div class="expiration-date">
                            <div class="expiration-date-text">{{$todo->expiration_date}}</div>
                        </div>
                        <div class="icon">
                            <div class="open-icon">
                                <a href="{{route('admin.todos.show', $todo->slug)}}"><i class="fa-solid fa-magnifying-glass"></i></a>
                            </div>
                            <div class="edit-icon">
                                <a href="{{route('admin.todos.edit', $todo->slug)}}"><i class="fa-solid fa-pen"></i></a>    
                            </div>   
                        </div>
                    </div>

                </div>   
            @endforeach
        </ul>
        <div class="button-add">
            <a href="{{route('admin.todos.create')}}"><button class="add-todo">+</button></a>   
        </div>
    </div>  
</div>


@endsection