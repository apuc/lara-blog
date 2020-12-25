@extends('admin')

@section('title', 'Список комментариев')

@section('breadcrumbs')
    <span><a href="/adminlte">Админ Панель</a></span> / <span>Список комментариев</span>
@endsection

@section('content')
<table class="table table-striped">
    <thead class="thead-dark">
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Автор</th>
        <th scope="col">Контент</th>
        <th scope="col">Статус публикации</th>
        <th scope="col">Действия</th>
    </tr>
    </thead>
    <tbody>
    @foreach($comments as $comment)
        <tr>
            <td>{{$comment->id}}</td>
            <td>{{$comment->author}}</td>
            <td>{{$comment->content}}</td>
            <td>@if($comment->publish == 1) Опубликовано @else Не опубликовано @endif</td>
            <td>
                <a class="custom-link" href="{{route('comments.publish')}}?id={{$comment->id}}">
                    <i class="nav-icon fas fa-stamp"></i>
                </a>
                <a class="custom-link" href="{{route('comments.delete')}}?id={{$comment->id}}">
                    <i class="nav-icon fas fa-trash"></i>
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

{{$comments->links()}}

@endsection
