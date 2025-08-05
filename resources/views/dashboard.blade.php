@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
        </div>
        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            This week
        </button>
    </div>
</div>

{{-- Kartu statistik hanya ditampilkan untuk admin --}}
@if (auth()->user()->role === 'admin')
<div class="row">
    <div class="col-md-4">
        <div class="card text-white bg-primary mb-3">
            <div class="card-body">
                <h5 class="card-title">Total Employees</h5>
                <h1 class="display-4">250</h1>
                <p class="card-text">Total employees in all divisions.</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-white bg-success mb-3">
            <div class="card-body">
                <h5 class="card-title">Active Divisions</h5>
                <h1 class="display-4">12</h1>
                <p class="card-text">Number of active divisions.</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-white bg-info mb-3">
            <div class="card-body">
                <h5 class="card-title">Pending Leave</h5>
                <h1 class="display-4">7</h1>
                <p class="card-text">Number of pending leave requests.</p>
            </div>
        </div>
    </div>
</div>
@endif

<div class="card mt-4">
    <div class="card-header">
        Welcome!
    </div>
    <div class="card-body">
        <h5 class="card-title">Halo, {{ Auth::user()->name }}</h5>
        <p class="card-text">Selamat datang di dashboard Aplikasi HRIS. Di sini Anda bisa mengelola data karyawan, divisi, absensi, dan gaji.</p>
        <a href="{{ route('user.absen') }}" class="btn btn-primary">Check Attendance Now</a>
    </div>
</div>
@endsection
