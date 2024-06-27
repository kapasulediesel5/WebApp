@extends('layouts.backend.app')

@section('content')
    <div class="container">
        <h2 class="mt-5">Edit Package</h2>
        <form id="editPackageForm" action="{{ route('packages.update', $package->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <select class="form-control" id="name" name="name" required>
                    @foreach (\App\Enums\PackageType::cases() as $status)
                        <option value="{{ $status->value }}" @if($package->name == $status->value) selected @endif>
                            {{ $status->name }}
                        </option>
                    @endforeach
                </select>
                <div class="invalid-feedback">Please select a package name.</div>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" class="form-control" id="price" name="price" value="{{ $package->price }}" required>
                <div class="invalid-feedback">Please enter a price.</div>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description"
                          required>{{ $package->description }}</textarea>
                <div class="invalid-feedback">Please enter a description.</div>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection