@extends('layout')

@section('title', 'Главная')

@section('content')
<!-- blog area -->
    <section class="blog_area bg_color sec_pad">
        <div class="container">
            <div class="row">
                @foreach($posts as $post)
                <div class="col-lg-6">
                    <div class="blog_item blog_item_bg">
                        <div class="blog_img">
                            <img src="/storage/images/previews/{{$post->preview}}" alt="" class="img-fluid">
                            <a href="{{route('site.post', $post->id)}}">

                            </a>
                        </div>
                        <div class="blog_content">
                            <a href="{{route('site.post', $post->id)}}"><h5 class="title_head">{{$post->title}}</h5></a>
                            <p>{{$post->sub_title}}.</p>
                            <div class="post_info">
                                @if ($post->categories->count())
                                    Категории:
                                    @foreach($post->categories as $category)
                                        <a href="{{route('site.category', $category->id)}}">{{$category->name}}</a>
                                        @if (!$loop->last),@endif
                                    @endforeach
                                @endif

                                Опубликовано: {{$post->created_at}}
                            </div>
                        </div>
                        <div class="blog_button_inner">
                            <a href="#" class="theme_btn gray_btn">Читать далее</a>
                            <a href="#" class="social_btn gray_btn"><i class="flaticon-heart"></i> {{$post->likes}}</a>
                            <a href="#" class="social_btn gray_btn"><i class="flaticon-talk"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="text-center mt-3">
                {{$posts->links()}}
            </div>
        </div>
    </section>
    <!-- blog area -->
@endsection
