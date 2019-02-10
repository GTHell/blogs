@extends("layouts.main")
@section("content")
    <!-- Page Header -->
    <header class="masthead" style='background-image: url("{{asset($post->lead_img)}}")'>
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="post-heading">
                        <h1>{{$post->title}}</h1>
                        <span class="meta">Posted by
                <a href="#">{{$post->user->name}}</a>
                on {{$post->created_at}}</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Post Content -->
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    {!! $post->body !!}
                </div>
            </div>
        </div>
    </article>

    <hr>

    <!-- Comment -->
    <section id="comment_section" class="container">
        {{--@auth--}}
        <div class=" mb-3">
            <form action="{{route('comment.store', ['id' => $post->id])}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="comment">Comment</label>
                    <textarea class="form-control" name="body" id="comment" rows="3"></textarea>
                </div>
                <input type="hidden" value="{{Request::url()}}" name="post_url">
                <button type="submit" class="btn btn-primary">post</button>
            </form>
        </div>
        {{--@endauth--}}
        @foreach($post->user->comments as $comment)
            @if(!$comment->parent_id )
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                                <img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid"/>
                                <p class="text-secondary text-center">{{$comment->created_at->diffForHumans()}}</p>
                            </div>
                            <div class="col-md-10">
                                <p>
                                    <a class="float-left"
                                       href="https://maniruzzaman-akash.blogspot.com/p/contact.html"><strong>{{$comment->user->name}}</strong></a>
                                </p>
                                <div class="clearfix"></div>
                                <p>{{$comment->body}}</p>
                                <p>
                                    <a class="float-right btn btn-outline-primary ml-2"> <i class="fa fa-reply"></i>
                                        Reply</a>
                                <form action="{{route('comment.destroy', ['id' => $post->id])}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" value="{{$comment->id}}" name="comment">
                                    <button class="float-right btn btn-outline-primary ml-2" type="submit"><i
                                            class="fa fa-reply"></i> Delete
                                    </button>
                                </form>
                                </p>
                            </div>
                        </div>
                        {{-- sub comment --}}
                        @if(count($comment->replies)>0)
                            @include('comment-recursive', ['comment' => $comment->replies])
                        @endif
                        {{--@if(count($comment->replies) > 0)--}}
                        {{--@foreach($comment->replies as $reply)--}}
                        {{--@include('comment-recursive', ['reply' => $reply])--}}
                        {{--@endforeach--}}
                        {{--@endif()--}}
                    </div>
                </div>
            @endif
        @endforeach
        {{--<div class="card">--}}
        {{--<div class="card-body">--}}
        {{--<div class="row">--}}
        {{--<div class="col-md-2">--}}
        {{--<img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid"/>--}}
        {{--<p class="text-secondary text-center">15 Minutes Ago</p>--}}
        {{--</div>--}}
        {{--<div class="col-md-10">--}}
        {{--<p>--}}
        {{--<a class="float-left" href="https://maniruzzaman-akash.blogspot.com/p/contact.html"><strong>Maniruzzaman--}}
        {{--Akash</strong></a>--}}
        {{--</p>--}}
        {{--<div class="clearfix"></div>--}}
        {{--<p>Lorem Ipsum is simply dummy text of the pr make but also the leap into electronic--}}
        {{--typesetting, remaining--}}
        {{--essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets--}}
        {{--containing--}}
        {{--Lorem Ipsum passages, and more recently with desktop publishing software like Aldus--}}
        {{--PageMaker including--}}
        {{--versions of Lorem Ipsum.</p>--}}
        {{--<p>--}}
        {{--<a class="float-right btn btn-outline-primary ml-2"> <i class="fa fa-reply"></i> Reply</a>--}}
        {{--</p>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="card card-inner">--}}
        {{--<div class="card-body">--}}
        {{--<div class="row">--}}
        {{--<div class="col-md-2">--}}
        {{--<img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid"/>--}}
        {{--<p class="text-secondary text-center">15 Minutes Ago</p>--}}
        {{--</div>--}}
        {{--<div class="col-md-10">--}}
        {{--<p><a href="https://maniruzzaman-akash.blogspot.com/p/contact.html"><strong>Maniruzzaman--}}
        {{--Akash</strong></a>--}}
        {{--</p>--}}
        {{--<p>Lorem Ipsum is simply dummy text of the pr make but also the leap into electronic--}}
        {{--typesetting,--}}
        {{--remaining essentially unchanged. It was popularised in the 1960s with the release of--}}
        {{--Letraset sheets--}}
        {{--containing Lorem Ipsum passages, and more recently with desktop publishing software--}}
        {{--like Aldus--}}
        {{--PageMaker including versions of Lorem Ipsum.</p>--}}
        {{--<p>--}}
        {{--<a class="float-right btn btn-outline-primary ml-2"> <i class="fa fa-reply"></i>--}}
        {{--Reply</a>--}}
        {{--</p>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
    </section>
@endsection
