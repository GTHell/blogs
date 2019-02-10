@extends('admin.layout.main')
@section('content')
    <div class="my-3">
        <h4>Upload Image</h4>
        <form action="{{route('admin.images.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="input-group control-group increment">
                <input class="form-control-file" type="file" name="image">
            </div>
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Upload</button>
        </form>
    </div>
    <h3>All images</h3>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">view</th>
            <th scope="col">name</th>
            <th scope="col">path</th>
            <th scope="col">User</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($images as $image)
            <tr>
                <th scope="row">{{$image->id}}</th>
                <td><img width="100" src="{{asset($image->url_path.'/'.$image->name)}}" alt=""></td>
                <td><a href="{{asset($image->url_path.'/'.$image->name)}}" target="_blank">{{$image->name}}</a></td>
                <td>{!!substr($image->body, 0, 30)!!}</td>
                <td>{{$image->user->name}}</td>
                <td>
                    <form onsubmit="return confirm('Are you sure?')"
                          action='{{route("admin.images.destroy", ['id' => $image->id])}}' method='post'
                          class="form-inline my-2 my-lg-0">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
