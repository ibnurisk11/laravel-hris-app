@extends('layouts.app')

@section('content')
    <h2 class="mt-4">Attendances</h2>
    <a href="{{ route('admin.attendances.create') }}" class="btn btn-primary mb-3">Add New Attendance</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Date</th>
                <th>Type</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($attendances as $attendance)
                <tr>
                    <td>{{ $attendance->id }}</td>
                    <td>{{ $attendance->user->name ?? 'N/A' }}</td>
                    <td>{{ $attendance->date }}</td>
                    <td>{{ $attendance->type }}</td>
                    <td>{{ $attendance->status }}</td>
                    <td>
                        <a href="{{ route('admin.attendances.show', $attendance) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('admin.attendances.edit', $attendance) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.attendances.destroy', $attendance) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $attendances->links() }}
@endsection