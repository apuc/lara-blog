@extends('admin')

@section('title', 'Добавление публикации')

@section('breadcrumbs')
    <span><a href="/adminlte">Админ Панель</a></span> / <span>Добавление публикации</span>
@endsection

@section('content')
    <div class="container">
        <form class="form-horizontal" id="create_form" method="post"
              action="{{route('posts.store')}}" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Заголовок публикации:</label>
                <input type="text" name="title" id="title" class="form-control" required="required" />
            </div>
            <div class="form-group">
                <label for="sub-title">Подзаголовок:</label>
                <input type="text" name="sub_title" id="sub-title" class="form-control" required="required" />
            </div>
            <div class="form-group">
                <label for="preview">Загрузка превью:</label>
                <input type="file" name="preview" id="preview" class="form-control" required="required" />
            </div>
            <div class="form-group">
                <label for="editor">Содержимое:</label>
                <textarea name="content" id="editor" class="form-control" required="required"></textarea>
            </div>
            <div class="form-group">
                <label for="email">Категория:</label>
                <select name="categories[]" class="custom-select" multiple="">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                    <option>Выберите категорию</option>
                </select>
            </div>
            <div class="form-group">
                <label for="tags">Теги:</label>
                <input type="text" name="tags" id="tags" class="form-control" />
            </div>
            <div class="form-group">
                <input type="submit" name="submit" id="submit_button" class="btn btn-dark" value="Создать">
            </div>
            @csrf
        </form>
    </div>
@endsection
