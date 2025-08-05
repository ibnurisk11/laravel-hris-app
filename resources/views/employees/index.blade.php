@extends('layouts.app')

@section('content')
    <h2 class="mt-4">Daftar Karyawan</h2>
    <a href="{{ route('employees.create') }}" class="btn btn-primary mb-3">Tambah Karyawan</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Departemen</th>
                <th>Jabatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
                <tr>
                    <td>{{ $employee->id }}</td>
                    <td>{{ $employee->first_name }} {{ $employee->last_name }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->department->name }}</td>
                    <td>{{ $employee->job_title }}</td>
                    <td>
                        </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection