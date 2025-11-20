@extends('master')

@section('content')
    <div class="row mb-3">
        <div class="col-md-12">
            <h2>Add New Service Used</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Service Used</span>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('serviceused.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-bold">Proposal Number</label>
                            <select name="proposal_id" class="form-select form-control" required>
                                @foreach ($proposals as $proposal)
                                    <option value="{{ $proposal->id }}">
                                        {{ $proposal->number }} - {{ Str::limit($proposal->description) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Service Name</label>
                            <input type="text" name="service_name" class="form-control"
                                placeholder="Contoh: Maintenance Server" value="{{ old('service_name') }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Status</label>
                            <select name="status" class="form-select form-control" required>
                                <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="agreed" {{ old('status') == 'agreed' ? 'selected' : '' }}>Agreed</option>
                                <option value="rejected" {{ old('status') == 'rejected' ? 'selected' : '' }}>Rejected
                                </option>
                            </select>
                        </div>
                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('serviceused.index') }}" class="btn btn-secondary me-2">Cancel</a>
                            <button type="submit" class="btn btn-primary">Save Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
