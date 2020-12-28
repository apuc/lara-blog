@extends('admin')

@section('title', 'Список публикаций')

@section('breadcrumbs')
    <span><a href="/adminlte">Админ Панель</a></span> / <span>Список публикаций</span>
@endsection

@section('content')
    <a href="/admin/posts/create" class="btn btn-dark">Создать</a>
    <div id="cjax">
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Заголовок</th>
                    <th scope="col">Категории</th>
                    <th scope="col">Дата публикации</th>
                    <th scope="col">Количество лайков</th>
                    <th scope="col">Количество просмотров</th>
                    <th scope="col">Статус публикации</th>
                    <th scope="col">Действия</th>
                </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->title}}</td>
                    <td>
                        @foreach($post->categories as $category)
                            {{$category->name}}@if (!$loop->last),@endif
                        @endforeach
                    </td>
                    <td>{{$post->created_at}}</td>
                    <td>{{$post->likes}}</td>
                    <td>{{$post->views}}</td>
                    <td>@if($post->publish == 1) Опубликовано @else Не опубликовано @endif</td>
                    <td>
                        <a class="custom-link" href="{{route('posts.publish')}}?id={{$post->id}}">
                            <i class="nav-icon fas fa-stamp"></i>
                        </a>
                        <a class="custom-link" href="{{route('posts.show')}}?id={{$post->id}}">
                            <i class="nav-icon fas fa-eye"></i>
                        </a>
                        <a an="Изменить статус" class="custom-link" href="{{route('posts.update')}}?id={{$post->id}}">
                            <i class="nav-icon fas fa-edit"></i>
                        </a>
                        <a class="custom-link" href="{{route('posts.delete')}}?id={{$post->id}}">
                            <i class="nav-icon fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$posts->links()}}
    </div>
@endsection
