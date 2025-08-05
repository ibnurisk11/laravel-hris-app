@extends('layouts.app')

@section('content')
    <h2 class="mt-4">Edit Attendance</h2>
    <form action="{{ route('admin.attendances.update', $attendance) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="user_id" class="form-label">User</label>
            <select class="form-control" id="user_id" name="user_id">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" @selected(old('user_id', $attendance->user_id) == $user->id)>{{ $user->name }}</option>
                @endforeach
            </select>
            @error('user_id')<div class="text-danger mt-2">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ old('date', $attendance->date) }}">
            @error('date')<div class="text-danger mt-2">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="check_in_time" class="form-label">Check In Time</label>
            <input type="time" class="form-control" id="check_in_time" name="check_in_time" value="{{ old('check_in_time', $attendance->check_in_time) }}">
            @error('check_in_time')<div class="text-danger mt-2">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="check_out_time" class="form-label">Check Out Time</label>
            <input type="time" class="form-control" id="check_out_time" name="check_out_time" value="{{ old('check_out_time', $attendance->check_out_time) }}">
            @error('check_out_time')<div class="text-danger mt-2">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <select class="form-control" id="type" name="type">
                <option value="present" @selected(old('type', $attendance->type) == 'present')>Present</option>
                <option value="leave" @selected(old('type', $attendance->type) == 'leave')>Leave</option>
                <option value="sick" @selected(old('type', $attendance->type) == 'sick')>Sick</option>
            </select>
            @error('type')<div class="text-danger mt-2">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <input type="text" class="form-control" id="status" name="status" value="{{ old('status', $attendance->status) }}">
            @error('status')<div class="text-danger mt-2">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description">{{ old('description', $attendance->description) }}</textarea>
            @error('description')<div class="text-danger mt-2">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="file" class="form-label">Attachment (File)</label>
            <input type="file" class="form-control" id="file" name="file">
            @error('file')<div class="text-danger mt-2">{{ $message }}</div>@enderror
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.attendances.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection