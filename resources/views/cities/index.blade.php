@extends('layouts.main')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Cities</h1>
    </div>
    {{-- <div class="row mx-auto"> --}}
        <div class="card">
            <div>
                @if(session()->has('message'))
                    <div class="alert alert-success">{{session('message')}}</div>
                @endif
            </div>
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <form class="row g-3" method="GET" action="{{route('cities.index')}}" enctype="multipart/form-data">
                            <div class="col-auto">
                              <input type="search" name="search" class="form-control" id="inputPassword2" placeholder="Search...">
                            </div>
                            <div class="col-auto">
                              <button type="submit" class="btn btn-primary mb-3">Search</button>
                            </div>
                        </form>
                    </div>
                    <div>
                        <a href="{{ route('cities.create') }}" class="btn btn-primary float-right">Create</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#Id</th>
                            <th scope="col">State Name</th>
                            <th scope="col">Name</th>
                            <th scope="col">Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cities as $city)
                            <tr>
                                <th scope="row">{{$city->id}}</th>
                                <td>{{$city->state->name}}</td>
                                <td>{{$city->name}}</td>
                                <td>
                                    <a href="{{route('cities.edit',$city->id)}}" class="btn btn-success">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    {{-- </div> --}}
@endsection
