@extends ('layout')

@section('title', 'Главная')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1> Данные обновлены: </h1>
            <hr>
            <a href={{route('main')}} > На главную </a>
        </div>
    </div>
@endsection