@extends('admin')

@section('title', $post->title)

@section('breadcrumbs')
    <span><a href="/adminlte">Админ Панель</a></span> / <span>{{$post->title}}</span>
@endsection

@section('content')
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Ключ</th>
                <th scope="col">Значение</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Содержимое</td>
                <td>{{$post->content}}</td>
            </tr>
        </tbody>
    </table>
@endsection
