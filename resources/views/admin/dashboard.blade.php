@extends('layouts/admin')

@section('content')
<h1>Benvenuto {{Auth::user()->name}}</h1>
<hr>
<ul>
    <li><a href="{{route('admin.todos.index')}}">Mostra tutti i Todo</a></li>
</ul>
@endsection