@extends('admin')

@section('title', 'Список категорий')

@section('breadcrumbs')
    <span><a href="/adminlte">Админ Панель</a></span> / <span>Список категорий</span>
@endsection

@section('content')
    <a href="/admin/categories/create" class="btn btn-dark">Создать</a>
    <div id="cjax">
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Название</th>
                    <th scope="col">Удаление</th>
                </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td><a href="/admin/categories/delete/?id={{$category->id}}">Удалить</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection



@section('content')
    Категории <br>
    @foreach($categories as $category)
        <div>
            {{$category->name}}
            <a href="/admin/categories/delete/?id={{$category->id}}">Удалить</a>
        </div>
    @endforeach
@endsection
