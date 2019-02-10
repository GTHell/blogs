@extends('admin.layout.main')
@section('content')
    <h4>Upload Image</h4>
    <form action="{{route('admin.posts.store')}}" method="POST">
        @csrf
        <div class="input-group control-group increment">
            <input class="form-control-file" type="file" name="image">
        </div>
        <button class="btn btn-outline-success my-2 my-sm-0">Store</button>
    </form>
@endsection
