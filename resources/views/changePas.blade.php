@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>Изменить пароль</h1>
                @if(Session::has('success'))
                    <div class="alert alert-success">Пароль обновлен</div>
                @elseif($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @elseif(Session::has('danger'))
                    <div class="alert alert-danger">Не верный текущий пароль</div>
                @endif

                <ul>
                    <li><a href="/profile/{{$user->id}}">Изменить профиль</a></li>
                </ul>
                <form action="/changepas/{{$user->id}}" method="POST" class="form">
                    <div class="form-group">
                        <label for="current_password">Текущий пароль</label>
                        <input type="password" id="current_password" name="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="current_password">Новый пароль</label>
                        <input type="password" id="current_password" name="password_new" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="current_password">Повторите новый пароль</label>
                        <input type="password" id="current_password" name="password_again" class="form-control">
                    </div>

                    <div class="form-group">
                        <button class="btn btn-warning" type="submit">Изменить</button>
                    </div>
                    @csrf
                </form>


            </div>
        </div>
    </div>
@endsection