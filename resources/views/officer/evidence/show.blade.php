@extends('layouts.userAdmin')

@section('content')
    <div class="container-fluid">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="row mb-2">
            <div class="col-md-12">
                <div class="d-flex justify-content-end" style="gap: 5px">
                    <a href="{{ route('officer.evidences.create', $id) }}" class="btn btn-primary mr-3">
                        Add Evidence
                    </a>
                    <a href="{{ route('officer.evidences.index') }}" class="btn btn-primary">
                        Back
                    </a>
                </div>
            </div>
        </div>
        <div class="row mt-4 justify-content-center">
            <div class="col-md-12">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Evidence Type</th>
                            <th scope="col">Suspect Name</th>
                            <th scope="col">Notes</th>
                            <th scope="col">Points</th>
                            <th scope="col">Evidence</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($evidences as $evidence)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <th><img src="{{ asset('storage/' . $evidence->image) }}"
                                        alt="{{ $evidence->evidence }}" style="width: 80px"></th>
                                <th>{{ $evidence->type }}</th>
                                <th>{{ $evidence->suspect->name }}</th>
                                <th>{{ $evidence->notes }}</th>
                                <th>{{ $evidence->points }}</th>
                                <th>{{ $evidence->evidence }}</th>
                                <td class="d-flex justify-content-end" style="gap: 5px">
                                    <a href="{{ route('officer.evidences.edit', $evidence->id) }}"
                                        class="btn btn-info mr-2 text-white">Edit</a>
                                    <form action="{{ route('officer.evidences.destroy', $evidence->id) }}" method="post">
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
