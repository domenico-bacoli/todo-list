@extends('layouts/admin')

@section('content')
<div class="container container-centered">
    <div class="todo-container">
        <h1>Promemoria</h1>
        <div class="todo-index">
            @foreach ($todos as $todo)
                <div class="single-todo {{$todo->is_completed ? 'todo-completed' : ''}}">
                    <div class="single-todo-top">
                        <div class="todo-title">
                            <h6>{{$todo->title}}</h6>
                        </div>

                        {{-- Gestione todo completati --}}
                        
                        <div id="is-completed">
                            <form action="{{route('admin.completed.index', $todo)}}" method="POST">
                                @csrf
            
                                <label class="form-check-label"></label>
                                <input name="is_completed" class="form-check-input submitCheckbox" type="radio" {{ $todo->is_completed ? 'checked' : '' }}>
                            </form>
                        </div>
                    </div>

                    

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
            </div>
        <div class="button-add">
            <a href="{{route('admin.todos.create')}}"><button class="add-todo">+</button></a>   
        </div>
    </div> 
    <script>
        let checkboxes = document.querySelectorAll(".submitCheckbox");
  
        checkboxes.forEach(function(checkbox) { checkbox.addEventListener('click', function() {
          this.closest('form').submit();
        });
      });
    </script> 
</div>


@endsection