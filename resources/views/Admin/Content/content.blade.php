@extends('layouts.backend.app')

@section('content')

    @if($contents->isEmpty())
        <p>No Content Available</p>
    @else
        @foreach ($contents as $content)

            <div class="container">
            <div class="col-lg-10">
                <div class="row m-3">
                    <div class="card cards-top col-lg-12">
                        <div class="cards-head d-flex justify-content-between">
                            <div>
                                <h3><b> Website Main Content Management </b></h3>
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
                                        <th>Who we are?</th>
                                        <th>vision</th>
                                        <th>History</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <tr>
                                        <td>{{ $content->header }}</td>
                                        <td>{{ $content->description }}</td>
                                        <td>{{ $content->who_we_are }}</td>
                                        <td>{{  $content->our_vision }}</td>
                                        <td>{{  $content->our_history }}</td>
                                        <td>
                                            <a href="/content/{{ $content->id }}/edit" class="btn btn-warning">Edit </a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>

        @endforeach
    @endif
    @endsection