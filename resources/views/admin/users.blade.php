@extends('layouts.layout')

@section('content')
    <div class="container">
        @if(Session::has('success'))
            <div class="alert alert-success">
                Пользователь успешно удален!
            </div>
        @endif
        <div class="col-md-12">
            <h1>Пользователи</h1>
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Имя</th>
                    <th>Email</th>
                    <th>Действия</th>
                </tr>
                </thead>

                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                @if($user->is_admin)
                                    <a href="/admin/roleuser/{{$user->id}}" class="btn btn-secondary">Назначить пользователем</a>
                                @else
                                    <a href="/admin/roleadmin/{{$user->id}}" class="btn btn-success">Назначить администратором</a>
                                @endif

                                <a href="/user/{{$user->id}}" class="btn btn-info">Посмотреть</a>
                                <a href="/profile/{{$user->id}}" class="btn btn-warning">Редактировать</a>
                                <a href="/admin/delete/{{$user->id}}" class="btn btn-danger" onclick="return confirm('Вы уверены?');">Удалить</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection