@extends('layouts.parent')

@section('title', 'All Actors')



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
                        <th>Name</th>
                        <th>gender</th>
                        <th>Age</th>
                        <th>Image</th>
                        <th>Creation Date</th>
                        <th>Operations</th>

                </tr>
            </thead>
            <tbody>

                @foreach ($actors as $actor)
                <tr>
                    <td>{{$actor->id}}</td>
                    <td>{{$actor->first_name }}  {{$actor->last_name}}</td>
                    <td>{{$actor->gender=="m" ? "Male":"Female"}}</td>
                    <td> 
                        {{ \Carbon\Carbon::parse($actor->birth_date)->diff(\Carbon\Carbon::now())->format('%y years old'); }}</td>
                    <td><img width="100" src="{{asset('/images/actors/'.$actor->image)}}" />
                    </td>
                    <td>{{$actor->created_at}}</td>

                    <td>
                        <a href="{{route('actors.edit',$actor->id)}}" class="btn btn-outline-warning">Edit</a>
                        <form action="{{route('actors.delete',$actor->id)}}" method="post" calss="d-inline">
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
    {{ $actors->links() }}
    <!-- /.card-body -->
</div>
    



@endsection
