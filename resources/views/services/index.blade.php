@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-header">Service Index
                    
        
                <div class="card-body">

                    <table class="table">
                    <thead>
                        <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Attachment 1</th>
                        <th>Attachment 2</th>
                        {{-- <th> action</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($services as $service)
                        <tr>
                            {{-- <td>{{ $service->id}}</td>
                            <td>{{ $service->title}}</td> --}}
                            
                            {{-- <td>{{ $service->user->name}}</td> --}}
                            <td>
                                <a href="" class="btn btn-primary">Show</a>
                                <a href="" class="btn btn-success">Edit</a>
                                <a href="" class="btn btn-danger"
                                    onclick="return confirm('Are you sure?')">Delete</a>
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