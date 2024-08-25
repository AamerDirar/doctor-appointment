@extends('layouts.app')

@section('content')
    <div class="container">
        @if (Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">User Profile</div>
                    <div class="card-body">
                        <p>Name:    {{ auth()->user()->name }}</p>
                        <p>Email:   {{ auth()->user()->email }}</p>
                        <p>Address: {{ auth()->user()->address }}</p>
                        <p>Phone:   {{ auth()->user()?->phone_number }}</p>
                        <p>Gender:  {{ auth()->user()?->gender }}</p>
                        <p>Bio:     {{ auth()->user()->description }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Update Profile</div>
                    <div class="card-body">
                        <form action="{{ route('profile.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ auth()->user()->name }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ auth()->user()->address }}">
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="phone_number">Phone Number</label>
                                <input type="text" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" value="{{ auth()->user()->phone_number }}">
                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select name="gender" class="form-control @error('gender') is-invalid @enderror">
                                    <option value="">Select gender</option>
                                    <option value="male"   @if(auth()->user()->gender === 'male')   selected @endif>Male</option>
                                    <option value="female" @if(auth()->user()->gender === 'female') selected @endif>Female</option>
                                </select>
                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Bio</label>
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror">{{ auth()->user()->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">User Image</div>
                    <form action="{{ route('profile.pic') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            @if (!auth()->user()->image)
                                <img src="/images/QtmhVY3ms8oWCNe24p4LDeEnCbJTH9c01vuwiPk8.png" width="120"><br><br>
                            @else
                                <img src="/profile/{{auth()->user()->image}}" width="120"><br><br>
                            @endif
                            <input type="file" name="file" class="form-control" required><br>
                            @error('file')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
