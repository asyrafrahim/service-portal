@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card mt-5">
                <div class="card-header">Service Index
                    
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('services.create') }}" >+ Create New Service
                            </a>
                    </div>

                <div class="card-body">

                    <table class="table">
                    <thead>
                        <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Attachment</th>
                        {{-- <th>Attachment 2</th> --}}
                        {{-- <th> action</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($services as $service)
                        <tr>
                            <td>{{ $service->id}}</td>
                            <td>{{ $service->user->name}}</td>
                            <td>{{ $service->title}}</td>
                            <td>{{ $service->description}}</td>
                            {{-- <td>{{ $service->getFirstMediaUrl('attachment_1', 'thumb') }}</td> --}}
                            <td><img height="50" width="120px" src="{{ $service->getFirstMediaUrl() }}" /></td>
                            
                            {{-- <td>{{ $service->attachment_1}}</td> --}}
                            
                            {{-- <td>{{ $service->user->name}}</td> --}}
                            <td>
                                <form action="{{ route('services.destroy', $service->id) }}" method="POST">
                                <a href="" class="btn btn-primary">Show</a>
                                <a href="{{ route('services.edit', $service) }}" class="btn btn-success">Edit</a>
                                @csrf
                                @method('DELETE')
                                {{-- <a href="{{ route('services.destroy', $service) }}" class="btn btn-danger"
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