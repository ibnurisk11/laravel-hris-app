@extends('layouts.app')

@section('content')
    <h2 class="mt-4">Edit User</h2>
    <form action="{{ route('admin.users.update', $user) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}">
            @error('name')<div class="text-danger mt-2">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="nip" class="form-label">NIP</label>
            <input type="text" class="form-control" id="nip" name="nip" value="{{ old('nip', $user->nip) }}">
            @error('nip')<div class="text-danger mt-2">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="ktp" class="form-label">KTP</label>
            <input type="text" class="form-control" id="ktp" name="ktp" value="{{ old('ktp', $user->ktp) }}">
            @error('ktp')<div class="text-danger mt-2">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="npwp" class="form-label">NPWP</label>
            <input type="text" class="form-control" id="npwp" name="npwp" value="{{ old('npwp', $user->npwp) }}">
            @error('npwp')<div class="text-danger mt-2">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}">
            @error('email')<div class="text-danger mt-2">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select class="form-control" id="role" name="role">
                <option value="user" @selected(old('role', $user->role) == 'user')>User</option>
                <option value="admin" @selected(old('role', $user->role) == 'admin')>Admin</option>
            </select>
            @error('role')<div class="text-danger mt-2">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="birth_date" class="form-label">Birth Date</label>
            <input type="date" class="form-control" id="birth_date" name="birth_date" value="{{ old('birth_date', $user->birth_date) }}">
            @error('birth_date')<div class="text-danger mt-2">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea class="form-control" id="address" name="address">{{ old('address', $user->address) }}</textarea>
            @error('address')<div class="text-danger mt-2">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="division_id" class="form-label">Division</label>
            <select class="form-control" id="division_id" name="division_id">
                @foreach ($divisions as $division)
                    <option value="{{ $division->id }}" @selected(old('division_id', $user->division_id) == $division->id)>{{ $division->name }}</option>
                @endforeach
            </select>
            @error('division_id')<div class="text-danger mt-2">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="position" class="form-label">Position</label>
            <input type="text" class="form-control" id="position" name="position" value="{{ old('position', $user->position) }}">
            @error('position')<div class="text-danger mt-2">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="joined_at" class="form-label">Joined At</label>
            <input type="date" class="form-control" id="joined_at" name="joined_at" value="{{ old('joined_at', $user->joined_at) }}">
            @error('joined_at')<div class="text-danger mt-2">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="contract_until" class="form-label">Contract Until</label>
            <input type="date" class="form-control" id="contract_until" name="contract_until" value="{{ old('contract_until', $user->contract_until) }}">
            @error('contract_until')<div class="text-danger mt-2">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="salary" class="form-label">Salary</label>
            <input type="number" step="0.01" class="form-control" id="salary" name="salary" value="{{ old('salary', $user->salary) }}">
            @error('salary')<div class="text-danger mt-2">{{ $message }}</div>@enderror
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection