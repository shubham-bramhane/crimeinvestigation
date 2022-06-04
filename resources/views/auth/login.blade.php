@extends('layouts.crime')

@section('content')
    {{-- <form action="{{ route('login') }}" method="POST" class="login-form">
        @csrf
        <div class="group">
            <label class="form-label" for="email">Email Address</label>
            <input type="email" id="email" type="email" class="form-input @error('email') is-invalid @enderror" name="email"
                value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
                <span>
                    <small style="font-size:12px;color:red">{{ $message }}</small>
                </span>
            @enderror
        </div>
        <div class="group">
            <label class="form-label" for="email">Password</label>
            <input type="password" id="password" type="password" class="form-input @error('password') is-invalid @enderror"
                name="password">
            @error('password')
                <span>
                    <small style="font-size:12px;color:red">{{ $message }}</small>
                </span>
            @enderror
        </div>
        <div class="group">
            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                {{ old('remember') ? 'checked' : '' }}>

            <label class="form-check-label" for="remember">
                {{ __('Remember Me') }}
            </label>
        </div>

        <button class="form-btn">login</button>
    </form> --}}
    <div class="form-content">
        <form class="form-card" action="{{ route('login') }}" method="POST">
            @csrf
            <div class="avatar">
                <img src="{{ asset('images/avatar.png') }}" alt="Avatar icon">
            </div>
            <div class="form-group-content">
                <div class="group">
                    <input type="email" id="form-email" placeholder="Email ID" class=" @error('email') error @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                </div>
                <div class="group">
                    <input type="password" id="form-pass" placeholder="Password" name="password"
                        class=" @error('password') error @enderror">
                </div>
                <div class="group flex-row align-items-center" style="gap: 10px">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                        {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
                <div class="group">
                    <button>login</button>
                </div>
            </div>
        </form>
    </div>


    <a href="/" class="login-btn">back</a>
@endsection
