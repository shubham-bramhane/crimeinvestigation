@extends('layouts.userAdmin')

@section('content')
    <div class="container">
        <div class="row mb-2">
            <div class="col-md-10">
                <div style="display: flex;justify-content: flex-end">
                    <a href="{{ route('officer.evidences.show', $evidence->crime_case_id) }}" class="btn btn-primary">
                        Back
                    </a>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">{{ __('Edit Evidence') }}</div>
                    <form class="card-body" action="{{ route('officer.evidences.update', $evidence->id) }}"
                        method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="suspect_id" class="form-label">Select Suspect:</label>
                            <select class="form-control" id="suspect_id" name="suspect_id" id="suspect_id">
                                <option value="">Select</option>
                                @foreach ($suspects as $suspect)
                                    <option value="{{ $suspect->id }}" @selected($evidence->suspect_id == $suspect->id)>
                                        {{ $suspect->name }}</option>
                                @endforeach
                            </select>
                            @error('suspect_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="type" class="form-label">Evidence Type:</label>
                            <select class="form-control" id="type" name="type" id="">
                                <option value="">Select</option>
                                <option value="logical" @selected($evidence->type == 'logical')>Logical</option>
                                <option value="physical" @selected($evidence->type == 'physical')>Physical</option>
                            </select>
                            @error('type')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="evidence" class="form-label">Enter Evidence:</label>
                            <input type="text" class="form-control" id="evidence" name="evidence"
                                value="{{ $evidence->evidence }}">
                            @error('evidence')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="notes" class="form-label">Notes:</label>
                            <textarea class="form-control" id="notes" rows="3" name="notes">{{ $evidence->notes }}</textarea>
                            @error('notes')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="points" class="form-label">Points:</label>
                            <select class="form-control" id="points" name="points" id="points">
                                <option value="">Select</option>
                                <option value="1" @selected($evidence->points === '1')>1</option>
                                <option value="2" @selected($evidence->points === '2')>2</option>
                                <option value="3" @selected($evidence->points === '3')>3</option>
                                <option value="4" @selected($evidence->points === '4')>4</option>
                                <option value="5" @selected($evidence->points === '5')>5</option>
                                <option value="6" @selected($evidence->points === '6')>6</option>
                                <option value="7" @selected($evidence->points === '7')>7</option>
                                <option value="8" @selected($evidence->points === '8')>8</option>
                                <option value="9" @selected($evidence->points === '9')>9</option>
                            </select>
                            @error('points')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Enter Suspect Picture:</label>
                            <input type="file" class="form-control" id="image" name="image">
                            @error('image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
