@extends('layouts.app')

@section('content')
    <h2 class="mt-4">User Details</h2>
    <div class="card">
        <div class="card-body">
            <p><strong>NIP:</strong> {{ $user->nip }}</p>
            <p><strong>KTP:</strong> {{ $user->ktp }}</p>
            <p><strong>NPWP:</strong> {{ $user->npwp }}</p>
            <p><strong>Name:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Role:</strong> {{ $user->role }}</p>
            <p><strong>Birth Date:</strong> {{ $user->birth_date }}</p>
            <p><strong>Address:</strong> {{ $user->address }}</p>
            <p><strong>Division:</strong> {{ $user->division->name ?? 'N/A' }}</p>
            <p><strong>Position:</strong> {{ $user->position }}</p>
            <p><strong>Joined At:</strong> {{ $user->joined_at }}</p>
            <p><strong>Contract Until:</strong> {{ $user->contract_until ?? 'N/A' }}</p>
            <p><strong>Salary:</strong> Rp {{ number_format($user->salary, 2, ',', '.') }}</p>
        </div>
    </div>
    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary mt-3">Back to List</a>
@endsection