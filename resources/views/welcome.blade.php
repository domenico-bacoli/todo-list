@extends('layouts.app')

@section('content')
<div class="home-container">
    <div class="title-container">
        <h1 class="display-5 fw-bold">Benvenuto in Todo List</h1>
    </div>
    <div class="welcome-container">
        <div class="image-container">
            <img class="desktop-image" src="{{ asset('/todo-list-app.png') }}" alt="todo list demo image">
            <img class="mobile-image" src="{{ asset('/todo-list-app-mobile.png') }}" alt="todo list demo image">
        </div>
        <div class="content">
            <div class="content-text">
                <p class="fs-5 pb-3">Tieni traccia di tutte le tue attività giornaliere!</p>
            </div>
            <div class="welcome-button">
                <a href="{{ route('login') }}" class="btn btn-primary btn-lg me-3" type="button">Accedi</a>
                <a href="{{ route('register') }}" class="btn btn-primary btn-lg" type="button">Registrati</a>
            </div>
        </div>
    </div>
</div>

@endsection