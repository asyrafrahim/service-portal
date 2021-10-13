@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-header">Edit Service</div>

                <div class="card-body">
                    <form action="{{ route('services.update', $service->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="Services">Choose a category:</label>
                            <select name="category_id" id="category_id" class='form-control' multiple>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" value="{{ $service->title }}">
                        </div>
                        <div class="form-group">
                            <label for="title">Description</label>
                            <textarea name="description" cols="20" rows="10" class="form-control">{{ $service->description }}</textarea>
                        </div>
                        {{-- <div class="form-group">
                            <label for="title">Attachment 1</label>
                            <input type="file" class="form-control" name="attachment_1" value="{{ $service->attachment_1 }}">
                        </div> --}}
                        {{-- <div class="form-group">
                            <label for="title">Attachment 2</label>
                            <input type="file" class="form-control" name="attachment_2" value="{{ $service->attachment_2 }}">
                        </div> --}}
                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-primary">Update Service</button>
                            <a href="{{ route('services.index') }}" class="btn btn-link">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection