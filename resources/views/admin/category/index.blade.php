@extends('admin.layout.main')
@section('content')
    <div class="my-4">
        <form action="{{route('admin.categories.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Category Name</label>
                <input type="text" id="name" class="form-control" name="name" required>
            </div>
            <select name="parent_id" id="parent_id" class="form-group">
                <option value="" selected>no parent</option>
                @foreach($cats as $cat)
                    <option class="form-control" value="{{$cat->id}}">{{$cat->name}}</option>
                @endforeach
            </select>
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Create</button>
        </form>
    </div>
    <h3>All cats</h3>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">name</th>
            <th scope="col">parent id</th>
            <th scope="col">User</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cats as $cat)
            <tr>
                <th scope="row">{{$cat->id}}</th>
                <td><a href="{{route('admin.categories.edit', ['id' => $cat->id])}}">{{$cat->name}}</a></td>
                <td>{{$cat->parent_id}}</td>
                <td>{{auth()->user()->name}}</td>
                <td>
                    <form onsubmit="return confirm('Are you sure?')"
                          action='{{route("admin.categories.destroy", ['id' => $cat->id])}}' method='post'
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
