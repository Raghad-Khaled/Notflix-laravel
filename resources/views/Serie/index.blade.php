@extends('layouts.parent')

@section('title', 'All Series')



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
                        <th>Realase Year</th>
                        <th>Language</th>
                        <th>Revenue -- Budget</th>
                        <th>Duration</th>
                        <th>IMDB Rate -- Count</th>
                        <th>Director</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Created at</th>
                        <th>Operations</th>

                </tr>
            </thead>
            <tbody>

                @foreach ($series as $serie)
                <tr>
                    <td>{{$serie->id}}</td>
                    <td>{{$serie->name }}</td>
                    <td>{{$serie->year}}</td>
                    <td> {{$serie->language}} </td>
                    <td>{{$serie->revenue}} -- {{$serie->budget }}</td>
                    <td>{{$serie->duration}}</td>
                    <td> {{$serie->imdb_rate}} -- {{$serie->imdb_rate_count}} </td>
                    <td> {{$serie->first_name}} {{$serie->last_name}} </td>
                    <td> {{$serie->description}} </td>
                    <td><a target="_block" href="{{$serie->link}}"> <img width="100" src="{{asset('/images/series/'.$serie->image)}}" /> </a>
                    </td>
                    <td>{{$serie->created_at}}</td>

                    <td>
                        <a href="{{route('series.edit',$serie->id)}}" class="btn btn-outline-warning">Edit</a>
                        <form action="{{route('series.delete',$serie->id)}}" method="post" calss="d-inline">
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
    {{ $series->links() }}
    <!-- /.card-body -->
</div>
    



@endsection
