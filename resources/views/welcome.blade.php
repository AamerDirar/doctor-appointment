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
        <!-- Date picker component -->
        <find-doctor></find-doctor>
        
    </div>
@endsection
