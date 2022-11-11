@extends('layouts.parent')

@section('title', 'All Prizes')



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
                        <th>Type</th>
                        <th>Creation Date</th>
                        <th>Operations</th>

                </tr>
            </thead>
            <tbody>

                @foreach ($prizes as $prize)
                <tr>
                    <td>{{$prize->id}}</td>
                    <td>{{$prize->title }} </td>
                    <td>{{$prize->type}}</td>
                    <td>{{$prize->created_at}}</td>

                    <td>
                        <a href="{{route('prizes.edit',$prize->id)}}" class="btn btn-outline-warning">Edit</a>
                        <form action="{{route('prizes.delete',$prize->id)}}" method="post" calss="d-inline">
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
    {{ $prizes->links() }}
    <!-- /.card-body -->
</div>
    



@endsection
