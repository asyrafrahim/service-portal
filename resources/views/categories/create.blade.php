@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-header">Create Category</div>

                <div class="card-body">
                    <form action="{{  route('categories.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Name</label>
                            <input type="text" class="form-control" name="name" required autocomplete="name">
                        </div>
                        
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">Create New Category</button>
                            <a href="" class="btn btn-link">Cancel</a>
                        </div>
                        
                    </form>
                </div> 
            </div>
        </div>
    </div>
</div>


@endsection