@extends('layouts.app')
@section('content')
    <h2 class="mt-4">Add New Division</h2>
    <form action="{{ route('admin.divisions.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Division Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
            @error('name')
                <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('admin.divisions.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection