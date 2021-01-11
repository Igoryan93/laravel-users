@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Данные пользователя</h1>
                <table class="table">
                    <thead>
                    <th>ID</th>
                    <th>Имя</th>
                    <th>Дата регистрации</th>
                    <th>Статус</th>
                    </thead>

                    <tbody>
                    <tr>
                        @foreach($user as $item)
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->date}}</td>
                            <td>{{$item->status}}</td>
                        @endforeach
                    </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection