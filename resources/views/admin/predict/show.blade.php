@extends('layouts.admin')

@section('content')
    <div class="container-fluid text-white">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="row mt-4 justify-content-center">
            <div class="col-md-4">
                <img class="suspect_image" src="{{ asset('storage/' . $suspect->profile_pic) }}"
                    alt="{{ $suspect->name }}">
            </div>
            <div class="col-md-7">
                <h1><b>Suspect:</b> {{ $suspect->name }}</h1><br>
                <h5><b>Relation:</b> {{ $suspect->relation }}</h5>
                <h5><b>Notes:</b> {{ $suspect->notes }}</h5>
            </div>
        </div>
        <div class="row mt-4 justify-content-center">
            <div class="col-md-7">
                <h5><b>Mobile Number:</b> {{ $suspect->mobile }}</h5>
                <h5><b>Address:</b> {{ $suspect->address }}</h5>
            </div>
            <div class="col-md-4"></div>
        </div>
        <div class="row mt-4 justify-content-center">
            <div class="col-md-11">
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
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($suspect->evidence as $evidence)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <th><img src="{{ asset('storage/' . $evidence->image) }}"
                                        alt="{{ $evidence->evidence }}" style="width: 80px"></th>
                                <th>{{ $evidence->type }}</th>
                                <th>{{ $evidence->suspect->name }}</th>
                                <th>{{ $evidence->notes }}</th>
                                <th>{{ $evidence->points }}</th>
                                <th>{{ $evidence->evidence }}</th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
