@extends('layouts.parent')

@section('title', 'All Directors')


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
            @if($directors->count()>0)
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

                        @foreach ($directors as $director)
                            <tr>
                                <td>{{ $director->id }}</td>
                                <td>{{ $director->first_name }} {{ $director->last_name }}</td>
                                <td>{{ $director->gender=='m'? "Male":"Female" }}</td>
                                <td>
                                    {{ \Carbon\Carbon::parse($director->birth_date)->diff(\Carbon\Carbon::now())->format('%y years old') }}
                                </td>
                                <td><img width="100" src="{{ asset('/images/directors/' . $director->image) }}" />
                                </td>
                                <td>{{ $director->created_at }}</td>

                                <td>
                                    <a href="{{ route('directors.edit', $director->id) }}" class="btn btn-outline-warning">Edit</a>
                                    <form action="{{ route('directors.delete', $director->id) }}" method="post" calss="d-inline">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            @else
                <div class="alert alert-success text-center">
                    No Directors, You Can Add One
                </div>
            @endif
        </div>
        {{ $directors->links() }}
        <!-- /.card-body -->
    </div>




@endsection
