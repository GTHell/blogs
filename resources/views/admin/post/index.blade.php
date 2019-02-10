@extends('admin.layout.main')
@section('content')
  <h3>All posts</h3>
  <a href="{{route('admin.posts.create')}}" class="btn btn-outline-success my-2 my-sm-0">Create</a>
  <table class="table">
    <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Body</th>
      <th scope="col">User</th>
      <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($posts as $post)
      <tr>
        <th scope="row">{{$post->id}}</th>
        <td><a href="{{route('admin.posts.edit', ['id' => $post->id])}}">{{$post->title}}</a></td>
        <td>{!!substr($post->body, 0, 30)!!}</td>
        <td>{{$post->user->name}}</td>
        <td>
          <form onsubmit="return confirm('Are you sure?')" action='{{route("admin.posts.destroy", ['id' => $post->id])}}' method='POST' class="form-inline my-2 my-lg-0">
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