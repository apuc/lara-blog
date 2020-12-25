@extends('admin')

@section('title')
Редактирование публикации "{{$post->title}}"
@endsection

@section('breadcrumbs')
    <span><a href="/adminlte">Админ Панель</a></span> / <span>Редактирование публикации "{{$post->title}}"</span>
@endsection

@section('content')
    <div class="container">
        <form class="form-horizontal" id="create_form" method="post"
              action="{{route('posts.store')}}" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Заголовок публикации:</label>
                <input type="text" name="title" id="title" class="form-control"
                       required="required" value="{{$post->title}}" />
            </div>
            <div class="form-group">
                <label for="sub-title">Подзаголовок:</label>
                <input type="text" name="sub_title" id="sub-title" class="form-control"
                       required="required" value="{{$post->sub_title}}"  />
            </div>
            <div class="form-group">
                <label for="preview">Загрузка превью:</label>
                <input type="file" name="preview" id="preview" class="form-control"
                       required="required" value="{{$post->preview}}" />
            </div>
            <div class="form-group">
                <label for="summernote">Содержимое:</label>
                <textarea name="content" id="summernote" class="form-control"
                          required="required">{{$post->content}}</textarea>
            </div>
            <div class="form-group">
                <label for="email">Категория:</label>
                <select name="categories[]" class="custom-select" multiple="">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}"
                                @if(in_array($category->id, $selectedCategories))
                                    selected
                                @endif;>{{$category->name}}</option>
                    @endforeach
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
