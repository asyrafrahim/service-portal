@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card mt-5">
                <div class="card-header">Appointment Index
                    
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('appointments.create') }}" >+ Create New Appointment
                        </a>
                    </div>

                <div class="card-body">

                    <table class="table">
                    <thead>
                        <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Contact</th>
                        <th>Service</th>
                        <th>Date and Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($appointments as $appointment)
                        <tr>
                            <td>{{ $appointment->id}}</td>
                            <td>{{ $appointment->user->name}}</td>
                            <td>{{ $appointment->user->contact}}</td>
                            <td>{{ $appointment->service->title}}</td>
                            <td>{{ $appointment->appointment_time}}</td>
                            
                            
                            <td>
                                <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST">
                                <a href="" class="btn btn-primary">Show</a>
                                <a href="{{ route('appointments.edit', $appointment) }}" class="btn btn-success">Edit</a>
                                @csrf
                                @method('DELETE')
                                {{-- <a href="{{ route('appointments.destroy', $appointment) }}" class="btn btn-danger"
                                    onclick="return confirm('Are you sure?')">Delete</a> --}}
                                    <button type="submit" title="delete" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    
                        @endforeach

                        
                    </tbody>
                    </table>
                
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection