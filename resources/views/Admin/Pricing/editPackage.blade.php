@extends('layouts.backend.app')

@section('content')
    <div class="container">
        <h2 class="mt-5">Edit Package</h2>
        <form id="editForm" action="{{ route('packages.update', $package->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <select class="form-control" id="name" name="name">
                    @foreach (\App\Enums\PackageType::cases() as $status)
                        <option value="{{ $status->value }}" @if($package->name == $status->value) selected @endif>
                            {{ $status->name }}
                        </option>
                    @endforeach
                </select>
                <div class="invalid-feedback"></div>
            </div>
            <div class="form-group">
                <label for="name">Price</label>
                <input type="text" class="form-control" id="price" name="price" value="{{ $package->price }}">
                <div class="invalid-feedback"></div>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description"
                          name="description">{{ $package->description }}</textarea>
                <div class="invalid-feedback"></div>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

@endsection