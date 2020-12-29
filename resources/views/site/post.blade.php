@extends('layout')

@section('title', $post->title)

@section('content')
    <!-- blog details area -->
    <section class="blog_details_area sec_pad">
        <div class="container">
            <div class="blog_details_info text-center">
                <img class="img-fluid" src="/storage/images/previews/{{$post->preview}}">
                <div class="post_details_content">
                    <h2>{{$post->title}}</h2>
                    <div class="post-content">{!! html_entity_decode($post->content, ENT_QUOTES, 'UTF-8') !!}</div>
                    <div class="post_info">
                        Опубликовано в категориях: @foreach($post->categories as $category)
                            <a class="post-tag" href="{{route('site.category', $category->id)}}">
                                {{trim($category->name)}}</a>@if (!$loop->last),@endif
                        @endforeach
                        с тегами:  @foreach($post->tags as $tag)
                            <a class="post-tag" href="{{route('site.tag', $tag->id)}}">
                                {{trim($tag->name)}}
                            </a>@if (!$loop->last),@endif
                        @endforeach в {{$post->created_at}}
                    </div>
                    <div class="post-counters blog_item">
                        <div class="blog_button_inner blog-item">
                            <div class="theme_btn"> Просмотров: {{$post->views}}</div>
                            <div class="theme_btn">
                                <i class="flaticon-talk"></i>
                                {{count($post->comments)}}
                            </div>
                            <a href="{{route('site.postLike', $post->id)}}" class="theme_btn gray_btn">
                                <i class="flaticon-heart"></i>
                                {{$post->likes}}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- blog details area -->

    <!-- Related post area -->
    <section class="related_post_area parallax_effect sec_pad" data-background="img/bg.jpg" style="background: url(img/related_post_bg.jpg) no-repeat;">
        <div class="overlay_bg"></div>
        <div class="container">
            <div class="row">
                @foreach($relatedPosts as $relatedPost)
                <div class="col-lg-4 col-md-6">
                    <div class="blog_item related_post">
                        <div class="blog_img">
                            <img src="/storage/images/previews/{{$relatedPost->preview}}" class="img-fluid">
                        </div>
                        <div class="blog_content">
                            <a href="{{route('site.post', $relatedPost->id)}}"><h5 class="title_head">{{$relatedPost->title}}</h5></a>
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
                            <a href="{{$relatedPost->id}}" class="theme_btn gray_btn">Читать далее</a>
                            <div href="#" class="theme_btn">
                                <i class="flaticon-heart"></i> {{$relatedPost->likes}}
                            </div>
                            <div href="#" class="theme_btn">
                                <i class="flaticon-talk"></i>
                                {{count($relatedPost->comments)}}
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Related post area -->
    <!--comments area-->
    <section class="blog_comment_area sec_pad">
        <div class="container">
            <div class="custom_box">
                <h3 class="comment_title">Комментарии: </h3>
                <ul class="comment_box list-unstyled">
                    @foreach($comments as $comment)
                    <li class="post_comment">
                        <div class="media comment_author">
                            <div class="media-body">
                                <div class="comment_info">
                                    <h3>{{$comment->author}}</h3>
                                    <div class="comment_date">{{$comment->created_at}}</div>
                                </div>
                                <p>{{$comment->content}}</p>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
                <div class="text-center mt-3">
                    {{$comments->links()}}
                </div>
            </div>
        </div>
    </section>
    <!--comments area-->
    <!--blog_comment_box area-->
    <section class="blog_comment_box bg_color sec_pad">
        <div class="container">
            <div class="custom_box">
                <form action="{{route('site.commentStore', $post->id)}}" method="POST" class="row comment_form">
                    <div class="col-md-12 form-group">
                        <input type="text" class="form-control" id="name" placeholder="Ваше имя" name="author">
                    </div>
                    <div class="col-md-12 form-group">
                        <textarea class="form-control message" placeholder="Комментрарий" name="content"></textarea>
                    </div>
                    <div class="col-lg-12 text-right">
                        <button class="btn theme_btn" type="submit">Отправить комментарий</button>
                    </div>
                    @csrf
                </form>
            </div>
        </div>
    </section>
    <!--blog_comment_box area-->
@endsection
