@extends('layouts.backend.app')

@section('content')
<div class="container">
    <h2 class="mt-5">Edit Service</h2>
    <form id="editForm" action="" method="POST">
        @csrf
        @method('POST')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="">
            <div class="invalid-feedback"></div>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description"></textarea>
            <div class="invalid-feedback"></div>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

@endsection

