@extends('master')

@section('content')
    <div class="row mb-3">
        <div class="col-md-12">
            <h2>Service Used List</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Berhasil!</strong> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>All Service Used</span>
                    <a href="{{ url('serviceused/create') }}" class="btn btn-primary btn-sm">Add New Service Used</a>
                </div>
                <div class="card-body">
                    @if ($services->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Proposal Number</th>
                                        <th>Service Name</th>
                                        <th style="text-align: center">Status</th>
                                        <th style="text-align: center">Timespent</th>
                                        <th style="text-align: center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($services as $service)
                                        <tr>
                                            <td>{{ $service->proposal->number ?? '-' }}</td>
                                            <td>{{ $service->service_name ?? '-' }}</td>
                                            <td style="text-align: center">
                                                @switch($service->status)
                                                    @case('pending')
                                                        <span class="badge bg-warning text-dark">Pending</span>
                                                    @break

                                                    @case('ongoing')
                                                        <span class="badge bg-info text-dark">Ongoing</span>
                                                    @break

                                                    @default
                                                        <span class="badge bg-success">Done</span>
                                                @endswitch
                                            </td>
                                            <td style="text-align: center">00:00</td>
                                            <td style="text-align: center">
                                                <a href="#" class="btn btn-sm btn-info">Edit</a>
                                                <a href="#" class="btn btn-sm btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-info">
                            No services found.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
