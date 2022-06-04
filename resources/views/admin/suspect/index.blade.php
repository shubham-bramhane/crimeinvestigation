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
                    <a href="{{ route('admin.cases.index') }}" class="btn btn-primary">
                        Back
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
                            <th scope="col">Suspect Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Mobile</th>
                            <th scope="col">Relation</th>
                            <th scope="col">Address</th>
                            <th scope="col">Notes</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($suspects as $suspect)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <th>
                                    <img src="{{ asset('storage/' . $suspect->profile_pic) }}"
                                        alt="{{ $suspect->name }}" style="width: 80px">
                                </th>
                                <th>{{ $suspect->name }}</th>
                                <th>{{ $suspect->mobile }}</th>
                                <th>{{ $suspect->relation }}</th>
                                <th>{{ $suspect->address }}</th>
                                <th>{{ $suspect->notes }}</th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
