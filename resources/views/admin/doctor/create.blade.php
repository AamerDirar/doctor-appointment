@extends('admin.layouts.master')

@section('content')
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-edit bg-blue"></i>
                    <div class="d-inline">
                        <h5>Doctors</h5>
                        <span>Add A New Doctor</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <nav class="breadcrumb-container" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="../index.html"><i class="ik ik-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Doctor</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-10">

            @if (Session::has('message'))
                <div class="alert alert-success">
                    {{ Session::get('message') }}
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h3>
                        Add doctor
                    </h3>
                </div>
                <div class="card-body">
                    <form class="forms-sample" action="{{ route('doctor.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="">Full Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                       placeholder="Doctor name" value="{{ old('name') }}">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="col-lg-6">
                                <label for="">Email</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                       placeholder="Email" value="{{ old('email') }}">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                                       placeholder="Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="col-lg-6">
                                <label for="">Gender</label>
                                <select name="gender" class="form-control @error('gender') is-invalid @enderror">
                                    <option value="">Select gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>

                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="">Education</label>
                                <input type="text" name="education" class="form-control @error('education') is-invalid @enderror"
                                       placeholder="Doctor highest degree" value="{{ old('education') }}">

                                @error('education')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="col-lg-6">
                                <label for="">Address</label>
                                <input type="text" name="address" class="form-control @error('address') is-invalid @enderror"
                                       placeholder="Doctor address" value="{{ old('address') }}">

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="">Specialist</label>
                                <select name="department" class="form-control">
                                    <option value="">Please select your department</option>
                                    @foreach (App\Department::all() as $d)
                                        <option value="{{ $d->department }}">{{ $d->department }}</option>
                                    @endforeach
                                </select>
                                @error('department')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="col-lg-6">
                                <label for="">Phone number</label>
                                <input type="text" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror"
                                       placeholder="Doctor phone number" value="{{ old('phone_number') }}">

                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control file-upload-info @error('image') is-invalid @enderror"
                                       placeholder="Upload Image">

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="col-md-6">
                                <label for="">Role</label>
                                <select name="role_id" class="form-control @error('role_id') is-invalid @enderror">
                                    <option value="">Please select role</option>
                                    @foreach (App\Role::where('name', '!=', 'patient')->get() as $role)
                                        <option value="{{ $role->id }}">
                                            {{ $role->name }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('role_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">About</label>
                            <textarea class="form-control @error('description') is-invalid @enderror"
                                      name="description" rows="4">{{ old('description') }}</textarea>

                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>


                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
