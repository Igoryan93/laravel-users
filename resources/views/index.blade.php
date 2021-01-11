@extends('layouts.layout')

@section('content')
    <div class="container">
        @if(Session::has('danger'))
            <div class="alert alert-danger">
                Вы можете просматривать только свой профиль!
            </div>
        @elseif(Session::has('warning'))
            <div class="alert alert-danger">
                У вас недостаточно прав!
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron">
                    @if(Auth::user())
                        <h1>Привет, {{Auth::user()->name}}!</h1>
                        <p class="lead">Это дипломный проект по разработке на PHP. На этой странице список наших пользователей.</p>
                    @else
                        <h1 class="display-4">Привет, мир!</h1>
                        <p class="lead">Это дипломный проект по разработке на PHP. На этой странице список наших пользователей.</p>
                        <hr class="my-4">
                        <p>Чтобы стать частью нашего проекта вы можете пройти регистрацию.</p>
                        <a class="btn btn-primary btn-lg" href="/reg" role="button">Зарегистрироваться</a>
                    @endif

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <h1>Пользователи</h1>
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Имя</th>
                        <th>Email</th>
                        <th>Дата</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($users->all() as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td><a href="/user/{{$user->id}}">{{$user->name}}</a></td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->date}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection