@extends('layouts.app')
@section('content')
    <h2 class="mt-4">Divisions</h2>
    <a href="{{ route('admin.divisions.create') }}" class="btn btn-primary mb-3">Add New Division</a>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($divisions as $division)
                <tr>
                    <td>{{ $division->id }}</td>
                    <td>{{ $division->name }}</td>
                    <td>
                        <a href="{{ route('admin.divisions.show', $division) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('admin.divisions.edit', $division) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.divisions.destroy', $division) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $divisions->links() }}
@endsection