@extends('layouts.parent')

@section('title', 'All Genre')


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
            @if($genres->count()>0)
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>

                            <th>Id</th>
                            <th>Type</th>
                            <th>Created at </th>
                            <th>Operations</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($genres as $genre)
                            <tr>
                                <td>{{ $genre->id }}</td>
                                <td>{{ $genre->type }}</td>
                                <td>{{ $genre->created_at }}</td>

                                <td>
                                    <form action="{{ route('genres.delete', $genre->id) }}" method="post" calss="d-inline">
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
                    No Genre, You Can Add One
                </div>
            @endif
        </div>
        {{ $genres->links() }}
        <!-- /.card-body -->
    </div>
@endsection
