@extends('layouts.app')

@section('content')
    <h2 class="mt-4">Add New User</h2>
    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
            @error('name')<div class="text-danger mt-2">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="nip" class="form-label">NIP</label>
            <input type="text" class="form-control" id="nip" name="nip" value="{{ old('nip') }}">
            @error('nip')<div class="text-danger mt-2">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="ktp" class="form-label">KTP</label>
            <input type="text" class="form-control" id="ktp" name="ktp" value="{{ old('ktp') }}">
            @error('ktp')<div class="text-danger mt-2">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="npwp" class="form-label">NPWP</label>
            <input type="text" class="form-control" id="npwp" name="npwp" value="{{ old('npwp') }}">
            @error('npwp')<div class="text-danger mt-2">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
            @error('email')<div class="text-danger mt-2">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
            @error('password')<div class="text-danger mt-2">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select class="form-control" id="role" name="role">
                <option value="user" @selected(old('role') == 'user')>User</option>
                <option value="admin" @selected(old('role') == 'admin')>Admin</option>
            </select>
            @error('role')<div class="text-danger mt-2">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="birth_date" class="form-label">Birth Date</label>
            <input type="date" class="form-control" id="birth_date" name="birth_date" value="{{ old('birth_date') }}">
            @error('birth_date')<div class="text-danger mt-2">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea class="form-control" id="address" name="address">{{ old('address') }}</textarea>
            @error('address')<div class="text-danger mt-2">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="division_id" class="form-label">Division</label>
            <select class="form-control" id="division_id" name="division_id">
                @foreach ($divisions as $division)
                    <option value="{{ $division->id }}" @selected(old('division_id') == $division->id)>{{ $division->name }}</option>
                @endforeach
            </select>
            @error('division_id')<div class="text-danger mt-2">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="position" class="form-label">Position</label>
            <input type="text" class="form-control" id="position" name="position" value="{{ old('position') }}">
            @error('position')<div class="text-danger mt-2">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="joined_at" class="form-label">Joined At</label>
            <input type="date" class="form-control" id="joined_at" name="joined_at" value="{{ old('joined_at') }}">
            @error('joined_at')<div class="text-danger mt-2">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="contract_until" class="form-label">Contract Until</label>
            <input type="date" class="form-control" id="contract_until" name="contract_until" value="{{ old('contract_until') }}">
            @error('contract_until')<div class="text-danger mt-2">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="salary" class="form-label">Salary</label>
            <input type="number" step="0.01" class="form-control" id="salary" name="salary" value="{{ old('salary') }}">
            @error('salary')<div class="text-danger mt-2">{{ $message }}</div>@enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection