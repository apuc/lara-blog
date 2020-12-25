@extends('admin')

@section('title', 'Добавление категории')

@section('breadcrumbs')
    <span><a href="/adminlte">Админ Панель</a></span> / <span>Добавление категории</span>
@endsection

@section('content')
    <div class="container">
        <form class="form-horizontal" name="create_form" id="create_form" method="post" action="{{route('categories.store')}}">
            <div class="form-group">
                <label for="title">Название категории:</label>
                <input type="text" name="name" id="title" class="form-control" required="required" />
            </div>
            <div class="form-group">
                <input type="submit" name="submit" id="submit_button" class="btn btn-dark" value="Создать">
            </div>
            @csrf
        </form>
    </div>
@endsection
