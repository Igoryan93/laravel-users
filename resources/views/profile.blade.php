@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>Профиль пользователя - {{$user->name}}</h1>
                @if(Session::has('success'))
                    <div class="alert alert-success">Профиль обновлен</div>
                @elseif($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <ul>
                    <li><a href="/changepas/{{$user->id}}">Изменить пароль</a></li>
                </ul>
                <form action="/profile/{{$user->id}}" method="POST" class="form">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="username">Имя</label>
                        <input type="text" id="username" name="name" class="form-control" value="{{$user->name}}">
                    </div>
                    <div class="form-group">
                        <label for="status">Статус</label>
                        <input type="text" id="status" name="status" class="form-control" value="{{$user->status}}">
                    </div>

                    <div class="form-group">
                        <button class="btn btn-warning" type="submit">Обновить</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection