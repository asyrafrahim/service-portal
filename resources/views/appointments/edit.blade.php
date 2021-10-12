@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-header">Edit Appointment</div>
                
                <div class="card-body">
                    <form action="{{ route('appointments.update', $appointment->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        {{-- <div class="form-group">
                            <label for="Services">Choose a service:</label>
                            <select name="service_id" id="service_id">
                                @foreach ($services as $service)
                                    <option value="{{ $service->id }}">{{ $service->title }}</option>
                                @endforeach
                            </select>
                        </div> --}}
                        <div class="form-group">
                            <label for="title">Date and Time</label>
                            <input type="datetime-local" id="appointment_time" name="appointment_time">
                        </div>
                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-primary">Update Appointment</button>
                            <a href="{{ route('appointments.index') }}" class="btn btn-link">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection