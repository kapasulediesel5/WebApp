@extends('layouts.backend.app')

@section('content')
    <div class="container">
        <h2>Edit Content</h2>
        <form action="{{ route('contents.update', $content->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="header">Header</label>
                <input type="text" class="form-control" id="header" name="header" value="{{ $content->header }}"
                       required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"
                          required>{{ $content->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="image1">Image 1</label>
                <input type="file" class="form-control-file" id="image1" name="image1"
                       value="old{{ $content->image1 }}">
            </div>
            <div class="form-group">
                <label for="image2">Image 2</label>
                <input type="file" class="form-control-file" id="image2" name="image2"
                       value="old{{ $content->image1 }}">
            </div>
            <div class="form-group">
                <label for="who_we_are">Who We Are</label>
                <textarea class="form-control" id="who_we_are" name="who_we_are" rows="3"
                          required>{{ $content->who_we_are }}</textarea>
            </div>
            <div class="form-group">
                <label for="our_vision">Our Vision</label>
                <textarea class="form-control" id="our_vision" name="our_vision" rows="3"
                          required>{{ $content->our_vision }}</textarea>
            </div>
            <div class="form-group">
                <label for="our_history">Our History</label>
                <textarea class="form-control" id="our_history" name="our_history" rows="3"
                          required>{{ $content->our_history }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    </div>

@endsection

