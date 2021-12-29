@extends('layouts.main')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Cities</h1>
    </div>
    {{-- <div class="row mx-auto"> --}}
        <div class="card">
            <div class="card-header">
                Create New Cities
                <a href="{{ route('cities.index') }}" class="float-right">Back</a>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('cities.store') }}" enctype="multipart/form-data">
                    @csrf

                    {{-- Country Name --}}
                    <div class="row mb-3">
                        <label for="state_id" class="col-md-4 col-form-label text-md-end">{{ __('State Name') }}</label>

                        <div class="col-md-6">
                            <select name="state_id" class="form-control" aria-label="Default select example">
                                <option selected>Select City</option>
                                @foreach ($states as $state)
                                    <option value="{{ $state->id}}">{{$state->name}}</option>
                                @endforeach
                            </select>

                            @error('state_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    {{-- Name --}}
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Cities Add') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    {{-- </div> --}}
@endsection
