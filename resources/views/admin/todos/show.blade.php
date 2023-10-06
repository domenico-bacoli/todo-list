@extends('layouts/admin')

@section('content')
<div class="container container-centered">
    <div class="single-todo-container {{$todo->is_completed ? 'todo-completed' : ''}}">
        <div class="title-is-completed-container">
            <h2 class="todo-title">{{$todo->title}}</h2>

            {{-- Gestione todo completati --}}                
            <div id="is-completed">
                <form action="{{route('admin.completed.show', $todo)}}" method="POST">
                    @csrf
                    <label class="form-check-label"></label>
                    <input name="is_completed" class="form-check-input submitCheckbox" type="radio" {{ $todo->is_completed ? 'checked' : '' }}>
                </form>
            </div>
        </div>
        <div class="todo-note">
            <h4>Note:</h4>
            <p class="todo-note-text">{{$todo->note}}</p>
        </div>
        <div class="todo-expiration-date">
            <h4>Data di Scadenza</h4>
            <div class="todo-expiration-date-text">{{\Carbon\Carbon::createFromTimestamp(strtotime($todo->expiration_date))->format('d-m-Y')}}</div>
        </div>       
        <div class="single-todo-button">
            <div class="show-edit-icon">
                <a href="{{route('admin.todos.edit', $todo)}}">
                    <i class="fa-solid fa-pen"></i>
                </a>
            </div>
            <div class="trash-icon">
                <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="fa-solid fa-trash"></i>
                </button> 
            </div>
        </div>
        <div class="button-absolute">
            <a href="{{route('admin.todos.index')}}"><i class="fa-solid fa-angle-left return-back"></i></a>   
        </div>

        <!-- Modale di bootstrap ( cancellazione definitiva todo ) -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Elimina il Todo</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Sei sicuro di voler eliminare definitivamente il todo? La modifica è irreversibile!
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
            
                        <form action="{{route('admin.todos.destroy', $todo)}}" method="POST">
                        @csrf
                        @method('DELETE')
                    
                        <button type="submit" class="btn btn-danger">Elimina</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    let checkboxes = document.querySelectorAll(".submitCheckbox");
    checkboxes.forEach(function(checkbox) { checkbox.addEventListener('click', function() {
      this.closest('form').submit();
    });
  });
</script>
@endsection