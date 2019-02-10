@extends('layouts.main')
@section('content')
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('../img/home-bg.jpg')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1>Test Blog</h1>
                        <span class="subheading">HEllo world</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                @foreach($posts as $post)
                    <div class="post-preview">
                        <a href="{{route('post', ['id' => $post->id])}}">
                            <h2 class="post-title">
                                {{$post->title}}
                            </h2>
                            <h3 class="post-subtitle">
                                {!!  substr($post->body, 0, 100) !!}
                            </h3>
                        </a>
                        <p class="post-meta">Posted by
                            <a href="#">{{$post->user->name}}</a> on {{$post->created_at}}</p>
                    </div>
                    <hr>
            @endforeach
            <!-- Pager -->
                <div class="clearfix">
                    <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
                </div>
            </div>
        </div>
    </div>
@endsection
