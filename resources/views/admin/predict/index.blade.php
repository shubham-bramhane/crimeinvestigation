@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger fw-bold" role="alert">
                {{ session('error') }}
            </div>
        @endif
        <div class="row mt-4 justify-content-center">
            <div class="col-md-10">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Case Name</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cases as $case)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <th>{{ $case->case_name }}</th>
                                <td class="d-flex justify-content-end">
                                    <a href="{{ route('admin.predict.show', $case->id) }}"
                                        class="btn btn-info mr-2 text-white">Predict Results</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
