@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-header">Create Appointment</div>

                <div class="card-body">
                    <form action="{{  route('appointments.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="Services">Choose a service:</label>
                            <select name="service_id" id="service_id">
                                @foreach ($services as $service)
                                    <option value="{{ $service->id }}">{{ $service->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="title">Date and Time</label>
                            <input type="datetime-local" id="appointment_time" name="appointment_time">
                        </div>
                        
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">Create New Appointment</button>
                            <a href="" class="btn btn-link">Cancel</a>
                        </div>
                        
                    </form>
                </div> 
            </div>
        </div>
    </div>
</div>


@endsection