@extends('layouts.backend.app')

@section('content')

    <div class="container">
        <h2 class="mt-5">Edit Services</h2>
        <form id="editServicesForm" action="{{ route('services.update', $service->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="header">Header</label>
                <input type="text" class="form-control" id="header" name="header" value="{{ $service->header }}"
                       required>
                <div class="invalid-feedback"></div>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description"
                          name="description">{{ $service->description }}</textarea>
                <div class="invalid-feedback"></div>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection