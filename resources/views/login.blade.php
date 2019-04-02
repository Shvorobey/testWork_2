@extends ('layout')

@section('title', 'Главная')
@section('content')
    <div class="col-md-8">
        <h1 class="my-4" style="color:#C71585">Спасибо за регистрацию <br>
            <small>Введите email и пароль</small>
        </h1>
        @include ('load')

        <form
                method="POST" action = "{{route('check_login')}}"
                enctype="multipart/form-data" style="margin: 50px auto">
            {{csrf_field()}}
            <div class="form-group">
                <label for="exampleInputEmail">Введите Email:</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail"
                       aria-describedby="emailHelp"
                       placeholder="example@email.com" value="{{ old('email') }}"
                       required>
                <small id="emailHelp" class="form-text text-muted">* поле обязательно для заполнения.
                </small>
                <br>
                <label for="exampleInputPassword">Введите пароль:</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword"
                       aria-describedby="passwordHelp"
                       placeholder="**********" value="{{ old('password') }}"
                       required>
                <small id="passwordHelp" class="form-text text-muted">* поле обязательно для заполнения.
                </small>
                <br>
            </div>
            <button type="submit" class="btn btn-primary">Вход</button>
            <hr>
        </form>
    </div>
@endsection

@section ('advertising')
    <!-- Advertising Widget -->
    <div class="card my-4">
        <h5 class="card-header">Рекламный блок</h5>
        <div class="card-body">
            <strong style="color:#ff0000"> Покупайте наших слонов </strong>
        </div>
    </div>
@endsection