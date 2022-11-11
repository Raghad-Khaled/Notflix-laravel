@extends('layouts.parent')

@section('title', 'All Stories')



@section('contant')
<div class="col-12">
    @if (session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif
</div>
<div class="card">
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>

                        <th>Id</th>
                        <th>Title</th>
                        <th>Author Name</th>
                        <th>Image</th>
                        <th>OverView</th>
                        <th>Creation Date</th>
                        <th>Operations</th>

                </tr>
            </thead>
            <tbody>

                @foreach ($stories as $story)
                <tr>
                    <td>{{$story->id}}</td>
                    <td>{{$story->title }}</td>
                    <td>{{$story->author_name}}</td>
                    <td><img width="100" src="{{asset('/images/stories/'.$story->image)}}" /></td>
                    <td>{{$story->overview }}</td>
                    <td>{{$story->created_at}}</td>

                    <td>
                        <a href="{{route('stories.edit',$story->id)}}" class="btn btn-outline-warning">Edit</a>
                        <form action="{{route('stories.delete',$story->id)}}" method="post" calss="d-inline">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                        </form>
                       
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    {{ $stories->links() }}
    <!-- /.card-body -->
</div>
    



@endsection
