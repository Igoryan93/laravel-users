@extends('layouts.layoutAuth')

@section('content')
    <form class="form-signin" action="/create" method="POST" >
        {{ csrf_field() }}
        <img class="mb-4" src="images/apple-touch-icon.png" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Регистрация</h1>

        {{--<div class="alert alert-danger">--}}
            {{--<ul>--}}
                {{--<li>Ошибка валидации 1</li>--}}
                {{--<li>Ошибка валидации 2</li>--}}
                {{--<li>Ошибка валидации 3</li>--}}
            {{--</ul>--}}
        {{--</div>--}}
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
                </ul>
            </div>
        @endif


        @if(Session::has('success'))
            <div class="alert alert-success">
                Успешный успех
            </div>
        @endif

        <div class="alert alert-info">
            Информация
        </div>

        <div class="form-group">
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{old('email')}}">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="email" name="name" placeholder="Ваше имя" value="{{old('name')}}">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" id="password" name="password" placeholder="Пароль">
        </div>

        <div class="form-group">
            <input type="password" class="form-control" id="password" name="password_again" placeholder="Повторите пароль">
        </div>

        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" name="check"> Согласен со всеми правилами
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Зарегистрироваться</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2017-2020</p>
    </form>
@endsection


