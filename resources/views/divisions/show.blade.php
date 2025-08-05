@extends('layouts.app')
@section('content')
    <h2 class="mt-4">Division Details</h2>
    <div class="card">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $division->id }}</p>
            <p><strong>Name:</strong> {{ $division->name }}</p>
        </div>
    </div>
    <a href="{{ route('admin.divisions.index') }}" class="btn btn-secondary mt-3">Back to List</a>
@endsection