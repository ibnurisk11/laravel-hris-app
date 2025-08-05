@extends('layouts.app')
@section('content')
    <h2 class="mt-4">Edit Division</h2>
    <form action="{{ route('admin.divisions.update', $division) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Division Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $division->name) }}">
            @error('name')
                <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.divisions.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection