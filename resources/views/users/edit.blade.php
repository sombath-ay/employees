@extends('layouts.main')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Users</h1>
    </div>
    {{-- <div class="row mx-auto"> --}}
        <div class="card">
            <div class="card-header">
                Edit New User
                <div class="m-2 p-2 float-right d-flex">
                    <form action="{{route('users.destroy',$user->id)}}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete {{$user->username}}</button>
                    </form>
                    <a href="{{ route('users.index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('users.update',$user->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    {{-- username --}}
                    <div class="row mb-3">
                        <label for="username" class="col-md-4 col-form-label text-md-end">{{ __('Username') }}</label>

                        <div class="col-md-6">
                            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username', $user->username) }}" required autocomplete="username" autofocus>

                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    {{-- first name --}}
                    <div class="row mb-3">
                        <label for="first_name" class="col-md-4 col-form-label text-md-end">{{ __('First Name') }}</label>

                        <div class="col-md-6">
                            <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name', $user->first_name) }}" required autocomplete="first_name" autofocus>

                            @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    {{-- last name --}}
                    <div class="row mb-3">
                        <label for="last_name" class="col-md-4 col-form-label text-md-end">{{ __('Last Name') }}</label>

                        <div class="col-md-6">
                            <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name', $user->last_name) }}" required autocomplete="last_name" autofocus>

                            @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    {{-- email --}}
                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Update User') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <br>
        {{-- Change Password --}}
        <div class="card">
            <div class="card-header">
                Change Password
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('users.change.password',$user->id) }}" enctype="multipart/form-data">
                    @csrf
                    {{-- Password --}}
                    <div class="row mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Change Password') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    {{-- </div> --}}
@endsection
