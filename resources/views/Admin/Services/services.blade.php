@extends('layouts.backend.app')

@section('content')
    <div class="container">
        <div class="col-lg-10">
            <div class="row m-3">
                <div class="card cards-top col-lg-12">
                    <div class="cards-head d-flex justify-content-between">
                        <div>
                            <h3><b> Services Content Management </b></h3>
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
                                    <th>Header</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                @if($services->isEmpty())
                                    <p>No Content Available</p>
                                @else
                                    @foreach ($services as $service)
                                        <tbody>

                                        <tr>
                                            <td>{{ $service->header }}</td>
                                            <td>{{ $service->description }}</td>
                                            <td>
                                                <a href="{{ route('services.edit', $service->id) }}"
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
    </div>
@endsection