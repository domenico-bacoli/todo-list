@extends('layouts/admin')

@section('content')
<div class="container container-centered">
    <h1>Crea un nuovo todo</h1>

    <form action="{{route('admin.todos.store')}}" method="POST" class="w-50">
        @csrf

        <div class="mb-3">
            <label for="title">Titolo</label>
            <input type="text" name="title" id="title" class="form-control" value="{{old('title')}}">
        </div>

        <div class="mb-3">
            <label for="note">Note</label>
            <textarea type="text" name="note" id="note" class="form-control">{{old('note')}}</textarea>
        </div>

        <div class="mb-3">
            <label for="expiration_date">Data di Scadenza</label>
            <input type="date" name="expiration_date" id="expiration_date" class="form-control" value="{{old('expiration_date')}}">
        </div>

        <button type="submit" class="btn btn-primary">Aggiungi</button>
    </form>
</div>
@endsection