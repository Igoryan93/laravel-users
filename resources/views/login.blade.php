@extends('layouts.layoutAuth')

@section('content')

    <form class="form-signin" method="POST" action="/in">
        {{csrf_field()}}
        <img class="mb-4" src="images/apple-touch-icon.png" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Авторизация</h1>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(Session::has('warning'))
            <div class="alert alert-info">
                Логин или пароль неверны
            </div>
        @endif

        <div class="form-group">
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{old('email')}}">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" id="password" name="password" placeholder="Пароль">
        </div>

        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" name="check"> Запомнить меня
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Войти</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2017-2020</p>
    </form>
@endsection


