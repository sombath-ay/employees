@extends('layouts.main')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Departments</h1>
    </div>
    {{-- <div class="row mx-auto"> --}}
        <div class="card">
            <div class="card-header">
                Create New Departments
                <a href="{{ route('departments.index') }}" class="float-right">Back</a>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('departments.store') }}" enctype="multipart/form-data">
                    @csrf

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
                                {{ __('Departments Add') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    {{-- </div> --}}
@endsection
