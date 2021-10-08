@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-header">Category Index
                    
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('categories.create') }}" >+ Create New Category
                            </a>
                    </div>

                <div class="card-body">

                    <table class="table">
                    <thead>
                        <tr>
                        <th>ID</th>
                        <th>Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id}}</td>
                            <td>{{ $category->name}}</td>
                            <td>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                <a href="" class="btn btn-primary">Show</a>
                                <a href="{{ route('categories.edit', $category) }}" class="btn btn-success">Edit</a>
                                @csrf
                                @method('DELETE')
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