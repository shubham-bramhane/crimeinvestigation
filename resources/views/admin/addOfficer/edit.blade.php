@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row mb-2">
            <div class="col-md-10">
                <div style="display: flex;justify-content: flex-end">
                    <a href="{{ route('admin.officer.index') }}" class="btn btn-primary">
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
                    <div class="card-header">{{ __('Edit Officer') }}</div>
                    <form class="card-body" action="{{ route('admin.officer.update', $user) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="name" class="form-label">Enter Officer Name:</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Enter Officer Email:</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="mobile" class="form-label">Enter Officer Mobile Number:</label>
                            <input type="number" class="form-control" id="mobile" name="mobile"
                                value="{{ $user->mobile }}">
                            @error('mobile')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Enter Officer Address:</label>
                            <textarea class="form-control" id="address" rows="3" name="address">{{ $user->address }}</textarea>
                            @error('address')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="area" class="form-label">Enter Officer Area:</label>
                            <input type="text" class="form-control" id="area" name="area" value="{{ $user->area }}">
                            @error('area')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="profile_pic" class="form-label">Enter Officer Picture:</label>
                            <input type="file" class="form-control" id="profile_pic" name="profile_pic"
                                value="{{ $user->profile_pic }}">
                            @error('profile_pic')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        {{-- <div class="mb-3">
                            <label for="category_id" class="form-label">Enter Category:</label>
                            <select class="form-control" id="category_id" name="category_id" id="">
                                <option value="">Select</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id }}>
                                        {{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div> --}}
                        <button class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
