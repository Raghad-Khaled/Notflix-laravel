@extends('layouts.parent')

@section('title', 'All Characters')



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
                        <th>Overview</th>
                        <th>Character In Story</th>
                        <th>Image</th>
                        <th>Creation Date</th>
                        <th>Operations</th>

                </tr>
            </thead>
            <tbody>

                @foreach ($characters as $character)
                <tr>
                    <td>{{$character->id}}</td>
                    <td>{{$character->name }} </td>
                    <td>{{$character->gender=="m" ? "Male":"Female"}}</td>
                    <td> {{$character->overview}}</td>
                    <td>{{$character->title}}</td>
                    <td><img width="100" src="{{asset('/images/characters/'.$character->image)}}" />
                    </td>
                    <td>{{$character->created_at}}</td>

                    <td>
                        <a href="{{route('characters.edit',$character->id)}}" class="btn btn-outline-warning">Edit</a>
                        <form action="{{route('characters.delete',$character->id)}}" method="post" calss="d-inline">
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
    {{ $characters->links() }}
    <!-- /.card-body -->
</div>
@endsection
