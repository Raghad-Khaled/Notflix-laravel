@extends('layouts.parent')

@section('title', 'All Prizes for Director In series')


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
            @if($prizes->count()>0)
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>

                            <th>Director</th>
                            <th>Serie</th>
                            <th>Prize</th>
                            <th>Operations</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($prizes as $prize)
                            <tr>
                                <td>{{ $prize->director_first_name }} {{ $prize->director_last_name }}</td>
                                <td>{{ $prize->serie }}</td>
                                <td> {{$prize->prize_type}} {{$prize->prize_title}} </td>

                                <td>
                                    <form action="{{ route('directorprizeseries.delete', [$prize->director_id,$prize->prize_id,$prize->serie_id]) }}" method="post" calss="d-inline">
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
                <div class="alert alert-primary text-center">
                    No Prize for Directors, You Can Add One
                </div>
            @endif
        </div>
        {{ $prizes->links() }}
        <!-- /.card-body -->
    </div>




@endsection
