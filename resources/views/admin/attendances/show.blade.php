@extends('layouts.app')

@section('content')
    <h2 class="mt-4">Attendance Details</h2>
    <div class="card">
        <div class="card-body">
            <p><strong>User:</strong> {{ $attendance->user->name ?? 'N/A' }}</p>
            <p><strong>Date:</strong> {{ $attendance->date }}</p>
            <p><strong>Check In Time:</strong> {{ $attendance->check_in_time ?? 'N/A' }}</p>
            <p><strong>Check Out Time:</strong> {{ $attendance->check_out_time ?? 'N/A' }}</p>
            <p><strong>Type:</strong> {{ $attendance->type }}</p>
            <p><strong>Status:</strong> {{ $attendance->status }}</p>
            <p><strong>Description:</strong> {{ $attendance->description }}</p>
            @if ($attendance->file)
                <p><strong>Attachment:</strong> <a href="{{ asset('storage/' . $attendance->file) }}" target="_blank">View File</a></p>
            @endif
        </div>
    </div>
    <a href="{{ route('admin.attendances.index') }}" class="btn btn-secondary mt-3">Back to List</a>
@endsection