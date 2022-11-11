@extends('layouts.parent')

@section('title', 'All Movies')



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
                        <th>Name</th>
                        <th>Realase Year</th>
                        <th>Language -- Duration</th>
                        <th>Revenue -- Budget</th>
                        <th>IMDB Rate -- Count</th>
                        <th>Director</th>
                        <th>Story title</th>
                        <th>Image -- Created at</th>
                        <th>Description</th>
                        <th>Operations</th>

                </tr>
            </thead>
            <tbody>

                @foreach ($movies as $movie)
                <tr>
                    <td>{{$movie->id}} - {{$movie->name }}</td>
                    <td>{{$movie->year}}</td>
                    <td> {{$movie->language}} -- {{$movie->duration}} </td>
                    <td>{{$movie->revenue}} -- {{$movie->budget }}</td>
                    <td> {{$movie->imdb_rate}}/10 -- {{$movie->imdb_rate_count}} </td>
                    <td> {{$movie->first_name}} {{$movie->last_name}} </td>
                    <td> {{$movie->title}} </td>
                    <td><a target="_block" href="{{$movie->link}}"> <img width="100" src="{{asset('/images/movies/'.$movie->image)}}" /> </a>
                       <br> {{$movie->created_at}}
                    </td>
                    <td > {{$movie->description}} </td>

                    <td>
                        <a href="{{route('movies.edit',$movie->id)}}" class="btn btn-outline-warning">Edit</a>
                        <form action="{{route('movies.delete',$movie->id)}}" method="post" calss="d-inline">
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
    <!-- /.card-body -->
    {{ $movies->links() }}
</div>
    



@endsection
