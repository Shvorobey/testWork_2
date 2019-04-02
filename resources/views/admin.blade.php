@extends ('layout')

@section('title', 'Главная')
@section('content')
    <div class="col-md-8">
        <h1 class="my-4" style="color:#C71585">Спасибо за регистрацию <br>
            <small>Введите email и пароль</small>
        </h1>
        @include ('load')

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <form action="" method="post" enctype="multipart/form-data">
                            @csrf
                            <strong> Пользователь:</strong> <br>
                            <hr>
                            <strong>Имя:</strong> <br>
                            <input type="text" name="name"
                                   value="{{old ('name', Session::get('email') )}}"/><br>
                            @if ($errors->any('name'))
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->get('name') as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <hr>
                            <strong>Email:</strong> <br>
                            <input type="text" name="email"
                                   value="{{old ('email', Session::get('email') )}}"/><br>
                            @if ($errors->any('name'))
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->get('name') as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <input type="submit" value="Сохранить"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>

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