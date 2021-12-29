@extends('layouts.main')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Cities</h1>
    </div>
    {{-- <div class="row mx-auto"> --}}
        <div class="card">
            <div class="card-header">
                Edit New Cities
                <div class="m-2 p-2 float-right d-flex">
                    <form action="{{route('cities.destroy',$city->id)}}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete {{$city->name}}</button>
                    </form>
                    <a href="{{ route('cities.index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('cities.update',$city->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    {{-- Country Name --}}
                    <div class="row mb-3">
                        <label for="country_code" class="col-md-4 col-form-label text-md-end">{{ __('State Name') }}</label>

                        <div class="col-md-6">
                            <select name="state_id" class="form-control" aria-label="Default select example">
                                <option selected>Select City</option>
                                @foreach ($states as $state)
                                    <option value="{{ $state->id}}" {{$state->id == $city->state_id ? 'selected' : ''}}>{{$state->name}}</option>
                                @endforeach
                            </select>

                            @error('country_code')
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
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name',$city->name) }}" required autocomplete="name" autofocus>

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
                                {{ __('Updated city') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    {{-- </div> --}}
@endsection
