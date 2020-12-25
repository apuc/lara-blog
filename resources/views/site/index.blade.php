@extends('layout')

@section('title', 'Главная')

@section('content')
    <div class="container">
        @foreach($posts as $post)
        <div class="row my-5 card">
            <div><img class="img-fluid" src="/storage/images/previews/{{$post->preview}}" /></div>
            <div id="post-title" class="col-12">
                <a href="{{route('site.post', ['id' => $post->id])}}"> {{$post->title}}</a>
            </div>
            <div id="sub-title" class="col-12">{{$post->sub_title}}</div>
            <div class="post-rating">Просмотров: {{$post->views}} Лайков: {{$post->likes}}</div>
            <div class="post-publish-date">Опубликовано: {{$post->created_at}}</div>
            <div class="post-categories">
                Категории:
                @if ($post->categories->count())
                    @foreach($post->categories as $category)
                        <a href="{{route('site.category', $category->category->id)}}">{{$category->category->name}}</a>
                        @if (!$loop->last),@endif
                    @endforeach
                @else
                    без категории
                @endif
            </div>
        </div>
        @endforeach
        <div class="row">
            <div class="col-12">{{$posts->links()}}</div>
        </div>
    </div>
@endsection
