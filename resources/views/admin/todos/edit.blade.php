@extends('layouts/admin')

@section('content')
<div class="container">
    <h1>Modifica Todo</h1>

    <form action="{{route('admin.todos.update', $todo)}}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title">Titolo</label>
            <input type="text" name="title" id="title" class="form-control" value="{{old('title') ?? $todo->title}}">
        </div>

        <div class="mb-3">
            <label for="note">Note</label>
            <textarea type="text" name="note" id="note" class="form-control">{{old('note') ?? $todo->note}}</textarea>
        </div>

        <div class="mb-3">
            <label for="expiration_date">Data di Scadenza</label>
            <input type="date" name="expiration_date" id="expiration_date" class="form-control" value="{{old('expiration_date') ?? $todo->expiration_date}}">
        </div>

        <button type="submit" class="btn btn-primary">Modifica</button>
    </form>
</div>
@endsection