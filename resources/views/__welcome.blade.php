@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="/banner/online-medicine-concept_160901-152.jpg" class="img-fluid" style="border:1px solid #ccc;">
            </div>
            <div class="col-md-6">
                <h2>
                    Create an account & Book your appointment
                </h2>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla facere praesentium architecto eligendi.
                    Facere optio,cum atque necessitatibus ipsam unde mollitia ex vero possimus nulla totam in dignissimos
                    omnis minus?
                </p>
                <div class="mt-5">
                    <a href="{{ url('/register') }}"><button class="btn btn-success">Register as Patient</button></a>
                    <a href="{{ url('/login') }}"><button class="btn btn-secondary">Login</button></a>
                </div>
            </div>
        </div>

        <hr>
        <!-- Search doctor -->
        <form action="{{ url('/') }}" method="GET">
            <div class="card">
                <div class="card body">
                    <div class="card-header">
                        Find Doctors
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <input type="text" name="date" class="form-control" id="datepicker">
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-primary" type="submit">
                                    Find Doctors
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!-- Display doctors -->
        <div class="card">
            <div class="card-body">
                <div class="card-header">Doctors</div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Expertise</th>
                                <th>Book</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse ($doctors as $doctor)
                                <tr>

                                    <th scope="row"></th>
                                    <td>
                                        <img src="{{ asset('images') }}/{{ $doctor->doctor->image }}" width="100px" style="border-radius: 50%;">
                                    </td>
                                    <td>
                                        {{ $doctor->doctor->name }}
                                    </td>
                                    <td>
                                        {{ $doctor->doctor->department }}
                                    </td>
                                    <td>
                                        <a href="{{ route('create.appointment', [$doctor->user_id, $doctor->date]) }}"><button class="btn btn-success">Book Appointment</button>
                                    </td>
                                </tr>
                            @empty
                                <td>No doctors avaiable today</td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
