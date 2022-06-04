@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="row mb-2">
            <div class="col-md-10">
                <div style="display: flex;justify-content: flex-end">
                    <a href="{{ route('admin.officer.create') }}" class="btn btn-primary">
                        Add Officer
                    </a>
                </div>
            </div>
        </div>
        <div class="row mt-4 justify-content-center">
            <div class="col-md-10">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Officer Picture</th>
                            <th scope="col">Officer Name</th>
                            <th scope="col">Officer Email</th>
                            <th scope="col">Officer Mobile</th>
                            <th scope="col">Officer Area</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($officers as $officer)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <th><img src="{{ asset($officer->Image()) }}" alt="{{ $officer->name }}"
                                        style="width: 80px"></th>
                                <th>{{ $officer->name }}</th>
                                <th>{{ $officer->email }}</th>
                                <th>{{ $officer->mobile }}</th>
                                <th>{{ $officer->area }}</th>
                                <td class="d-flex justify-content-end" style="gap: 5px">
                                    <a href="{{ route('admin.officer.edit', $officer->id) }}"
                                        class="btn btn-info mr-2 text-white">Edit</a>
                                    <form action="{{ route('admin.officer.destroy', $officer->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
