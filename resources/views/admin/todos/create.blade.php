@extends('layouts/admin')

@section('content')
<div class="todo-container">
    <h1>Crea un nuovo todo</h1>

    <form action="{{route('admin.todos.store')}}" method="POST" class="w-50">
        @csrf

        <div class="mb-3">
            <label for="title">Titolo</label>
            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{old('title')}}" required>
            @error('title')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="note">Note</label>
            <textarea type="text" name="note" id="note" cols="30" rows="5" class="form-control">{{old('note')}}</textarea>
        </div>

        <div class="mb-3">
            <label for="expiration_date">Data di Scadenza</label>
            <input type="date" name="expiration_date" id="expiration_date" class="form-control" value="{{old('expiration_date')}}">
        </div>
        <button type="submit" class="btn btn-primary text-center">Aggiungi</button>
    </form>
    <div class="button-absolute">
        <a href="{{route('admin.todos.index')}}"><button class="add-todo"><i class="fa-solid fa-angle-left return-back"></i></button></a>   
    </div>
</div> 

@endsection