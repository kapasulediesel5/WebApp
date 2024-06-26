@extends('layouts.backend.app')

@section('content')
    <div class="container-fluid">
        <div class="col-lg-10">
            <div class="row m-3">
                <div class="card cards-top col-lg-12">
                    <div class="cards-head d-flex justify-content-between">
                        <div>
                            <h3 class="text-center"><b> Packages Management </b></h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table-hover">
                            <div class="d-flex justify-content-end mb-2">

                            </div>


                            <table id="datatablesSimple" class="table table-bordered text-center" width="100%"
                                   cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Action</th>


                                </tr>
                                </thead>
                                @if($packages->isEmpty())
                                    <p>No Content Available</p>
                                @else
                                    @foreach ($packages as $package)
                                        <tbody>

                                        <tr>
                                            <td>{{ $package->name }}</td>
                                            <td> {{ $package->description }}</td>
                                            <td> $ {{ $package->price }}</td>
                                            <td>
                                                <a href="{{ route('packages.edit', $package->id) }}"
                                                   class="btn btn-warning">Edit</a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    @endforeach
                                @endif
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
