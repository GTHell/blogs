@extends('admin.layout.main')
@section('content')
    <h4>Create User</h4>
    <form action="{{route('admin.posts.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Post title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <textarea id="summernote" name="body" required></textarea>
        <div class="form-group">
            <label for="category_id">category</label>
            <select name="category_id" id="category_id" class="form-control">
                @foreach($cats as $cat)
                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-outline-success my-2 my-sm-0">Store</button>
    </form>

    @push('header')
        <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
        <script defer src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.min.js"></script>
        <script defer>
            window.addEventListener('DOMContentLoaded', function () {
                $(document).ready(function () {
                    $('#summernote').summernote();
                });
            })
        </script>
    @endpush
@endsection
