@extends('admin.layouts.master')

@section('content')
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-inbox bg-blue"></i>
                    <div class="d-inline">
                        <h5>Doctors</h5>
                        <span>All Doctors</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <nav class="breadcrumb-container" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="../index.html"><i class="ik ik-home"></i></a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#">Doctors</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Index</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">

            @if (Session::has('message'))
                <div class="alert alert-success">
                    {{ Session::get('message') }}
                </div>
            @endif

            <div class="card">
                <div class="card-header"><h3>Doctors</h3></div>
                <div class="card-body">
                    <table id="data_table" class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th class="nosort">Avatar</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Phone number</th>
                                <th class="nosort">&nbsp;</th>
                                <th class="nosort">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($doctors) > 0)
                                @foreach ($doctors as $doctor)
                                    <tr>
                                        <td>{{ $doctor->name }}</td>
                                        <td><img src="{{ asset('images') }}/{{ $doctor->image }}" class="table-user-thumb" alt=""></td>
                                        <td>{{ $doctor->email }}</td>
                                        <td>{{ $doctor->address }}</td>
                                        <td>{{ $doctor->phone_number }}</td>
                                        <td>
                                            <div class="table-actions">
                                                <a href="#" data-toggle="modal" data-target="#exampleModal{{$doctor->id}}"><i class="ik ik-eye"></i></a>
                                                <a href="{{ route('doctor.edit', $doctor->id) }}"><i class="ik ik-edit-2"></i></a>
                                                <a href="{{ route('doctor.show', $doctor->id) }}"><i class="ik ik-trash-2"></i></a>
                                            </div>
                                        </td>
                                        <td>x</td>
                                    </tr>

                                    <!-- View Modal -->
                                    @include('admin.doctor.modal')

                                @endforeach
                            @else
                                <td>No doctors found to display</td>

                            @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
