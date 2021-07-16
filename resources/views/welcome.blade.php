@extends('layouts.frontEnd')
@section('content')


    <div class="container">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <article class="hentry post post-standard has-post-thumbnail sticky">

                        <div class="post-thumb">
                            <img src="{{asset('/'. $first_post->featured)}}" alt="{{asset('/'. $first_post->title)}}">
                            <div class="overlay"></div>
                            <a href="{{asset('/'. $first_post->featured)}}" class="link-image js-zoom-image">
                                <i class="seoicon-zoom"></i>
                            </a>
                            <a href="#" class="link-post">
                                <i class="seoicon-link-bold"></i>
                            </a>
                        </div>

                        <div class="post__content">

                            <div class="post__content-info">

                                    <h2 class="post__title entry-title ">
                                        <a href="{{route('post.single',['slug' => $first_post->slug])}}">{{$first_post->title}}</a>
                                    </h2>

                                    <div class="post-additional-info">

                                        <span class="post__date">

                                            <i class="seoicon-clock"></i>

                                            <time class="published" datetime="2016-04-17 12:00:00">
                                            {{$first_post->created_at->diffForHumans()}}
                                            </time>

                                        </span>

                                        <span class="category">
                                            <i class="seoicon-tags"></i>
                                            <a href="#">{{$first_post->category->name}}</a>
                                        </span>

                                        <span class="post__comments">
                                            <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
                                            6
                                        </span>

                                    </div>
                            </div>
                        </div>

                </article>
            </div>
            <div class="col-lg-2"></div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <article class="hentry post post-standard has-post-thumbnail sticky">

                        <div class="post-thumb">
                            <img src="{{asset('/'. $second_post->featured)}}" alt="seo">
                            <div class="overlay"></div>
                            <a href="{{asset('/'. $second_post->featured)}}" class="link-image js-zoom-image">
                                <i class="seoicon-zoom"></i>
                            </a>
                            <a href="#" class="link-post">
                                <i class="seoicon-link-bold"></i>
                            </a>
                        </div>

                        <div class="post__content">

                            <div class="post__content-info">

                                    <h2 class="post__title entry-title ">
                                        <a href="{{route('post.single',['slug' => $second_post->slug])}}">{{$second_post->title}}</a>
                                    </h2>

                                    <div class="post-additional-info">

                                        <span class="post__date">

                                            <i class="seoicon-clock"></i>

                                            <time class="published" datetime="2016-04-17 12:00:00">
                                                {{$second_post->created_at->diffForHumans()}}
                                            </time>

                                        </span>

                                        <span class="category">
                                            <i class="seoicon-tags"></i>
                                            <a href="#"> {{$second_post->category->name}}</a>
                                        </span>

                                        <span class="post__comments">
                                            <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
                                            6
                                        </span>

                                    </div>
                            </div>
                        </div>

                </article>
            </div>
            <div class="col-lg-6">
                <article class="hentry post post-standard has-post-thumbnail sticky">

                        <div class="post-thumb">
                            <img src="{{asset('/'. $therd_post->featured)}}" alt="seo">
                            <div class="overlay"></div>
                            <a href="{{asset('/'. $therd_post->featured)}}" class="link-image js-zoom-image">
                                <i class="seoicon-zoom"></i>
                            </a>
                            <a href="#" class="link-post">
                                <i class="seoicon-link-bold"></i>
                            </a>
                        </div>

                        <div class="post__content">

                            <div class="post__content-info">

                                    <h2 class="post__title entry-title ">
                                        <a href="{{route('post.single',['slug' => $therd_post->slug])}}">{{$therd_post->title}}</a>
                                    </h2>

                                    <div class="post-additional-info">

                                        <span class="post__date">

                                            <i class="seoicon-clock"></i>

                                            <time class="published" datetime="2016-04-17 12:00:00">
                                         {{$therd_post->created_at->diffForHumans()}}
                                            </time>

                                        </span>

                                        <span class="category">
                                            <i class="seoicon-tags"></i>
                                            <a href="#">{{$therd_post->category->name}}</a>
                                        </span>

                                        <span class="post__comments">
                                            <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
                                            6
                                        </span>

                                    </div>
                            </div>
                        </div>

                </article>
            </div>
        </div>
    </div>


    <div class="container-fluid">
        <div class="row medium-padding120 bg-border-color">
            <div class="container">
                <div class="col-lg-12">
                <div class="offers">
                    <div class="row">
                        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                            <div class="heading">
                                <h4 class="h1 heading-title">{{$Food->name}}</h4>
                                <div class="heading-line">
                                    <span class="short-line"></span>
                                    <span class="long-line"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">


                    @foreach($Food->posts()->orderBy('created_at','desc')->take(3)->get() as $post)
                        
                        <div class="case-item-wrap">
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="case-item">
                                    <div class="case-item__thumb">
                                        <img src="{{asset('/'. $post->featured)}}" alt="our case">
                                    </div>
                                    <h6 class="case-item__title"><a href="#">{{$post->title}}</a></h6>
                                </div>
                            </div>

                        </div>
                    @endforeach
                    </div>
                </div>
                <div class="padded-50"></div>
                <div class="offers">
                    <div class="row">
                        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                            <div class="heading">
                                <h4 class="h1 heading-title">{{$Music->name}}</h4>
                                <div class="heading-line">
                                    <span class="short-line"></span>
                                    <span class="long-line"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">


@foreach($Music->posts()->orderBy('created_at','desc')->take(3)->get() as $post)
    
    <div class="case-item-wrap">
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="case-item">
                <div class="case-item__thumb">
                    <img src="{{asset('/'. $post->featured)}}" alt="our case">
                </div>
                <h6 class="case-item__title"><a href="#">{{$post->title}}</a></h6>
            </div>
        </div>

    </div>
@endforeach
</div>
                </div>
              
  
                <!-- <div class="padded-50"></div> -->
            </div>
            </div>
        </div>
    </div>

<!-- Subscribe Form -->
@endsection