@extends('layouts.parent')

@section('title', 'All Advertisement')


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
            @if($advertisements->count()>0)
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>

                            <th>Id</th>
                            <th>Image</th>
                            <th>Created at </th>
                            <th>Operations</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($advertisements as $advertisement)
                            <tr>
                                <td>{{ $advertisement->id }}</td>
                                <td><img width="200" src="{{ asset('/images/advertisements/' . $advertisement->image) }}" />
                                </td>
                                <td>{{ $advertisement->created_at }}</td>

                                <td>
                                    <form action="{{ route('advertisements.delete', $advertisement->id) }}" method="post" calss="d-inline">
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
                    No Advertisement, You Can Add One
                </div>
            @endif
        </div>
        {{ $advertisements->links() }}
        <!-- /.card-body -->
    </div>




@endsection
