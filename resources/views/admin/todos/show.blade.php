@extends('layouts/admin')

@section('content')
<div class="container container-centered">
    <h1>Todo Singolo</h1>
    <h4>{{$todo->title}}</h2>
    <p>{{$todo->note}}</p>

    <a href="{{route('admin.todos.edit', $todo)}}" class="btn btn-primary">Modifica</a>

<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Elimina
  </button>
  
  <!-- Modale di bootstrap -->
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

@endsection