@extends('layouts.parent')

@section('title', 'All Companies')



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
                        <th>Found Year</th>
                        <th>Creation Date</th>
                        <th>Operations</th>

                </tr>
            </thead>
            <tbody>

                @foreach ($companies as $company)
                <tr>
                    <td>{{$company->id}}</td>
                    <td>{{$company->name }}</td>
                    <td>{{$company->found_year}}</td>
                    <td>{{$company->created_at}}</td>

                    <td>
                        <a href="{{route('companies.edit',$company->id)}}" class="btn btn-outline-warning">Edit</a>
                        <form action="{{route('companies.delete',$company->id)}}" method="post" calss="d-inline">
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
    {{ $companies->links() }}
    <!-- /.card-body -->
</div>
    



@endsection
