@extends('master')

@section('content')
    <div class="row mb-3">
        <div class="col-md-12">
            <h2>Timeshee List</h2>
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
                    <span>All Timesheet</span>
                </div>
                <div class="card-body">
                    @if ($timesheets->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Employee</th>
                                        <th>Proposal Number</th>
                                        <th>Service Name</th>
                                        <th style="text-align: center">Start Time</th>
                                        <th style="text-align: center">Finish Time</th>
                                        <th style="text-align: center">Total Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($timesheets as $timesheet)
                                        <tr>
                                            <td>{{ date('d M Y', strtotime($timesheet->date)) ?? '-' }}</td>
                                            <td>{{ $timesheet->employee->fullname ?? '-' }}</td>
                                            <td>{{ $timesheet->serviceused->proposal->number ?? '-' }}</td>
                                            <td>{{ $timesheet->serviceused->service_name ?? '-' }}</td>
                                            <td style="text-align: center">
                                                {{ date('H : i', strtotime($timesheet->timestart)) ?? '-' }}
                                            </td>
                                            <td style="text-align: center">
                                                {{ date('H : i', strtotime($timesheet->timefinish)) ?? '-' }}
                                            </td>
                                            <td style="text-align: center"> {{ $timesheet->total_hours }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-info">
                            No timesheets found.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
