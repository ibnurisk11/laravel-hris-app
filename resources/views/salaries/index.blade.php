@extends('layouts.app')

@section('content')
    <h2 class="mt-4">Salaries</h2>
    <a href="{{ route('salaries.create') }}" class="btn btn-primary mb-3">Add New Salary</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Base Salary</th>
                <th>Bonus</th>
                <th>Deductions</th>
                <th>Net Salary</th>
                <th>Pay Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($salaries as $salary)
                <tr>
                    <td>{{ $salary->id }}</td>
                    <td>{{ $salary->user->name ?? 'N/A' }}</td>
                    <td>Rp {{ number_format($salary->base_salary, 2, ',', '.') }}</td>
                    <td>Rp {{ number_format($salary->bonus, 2, ',', '.') }}</td>
                    <td>Rp {{ number_format($salary->deductions, 2, ',', '.') }}</td>
                    <td>Rp {{ number_format($salary->base_salary + $salary->bonus - $salary->deductions, 2, ',', '.') }}</td>
                    <td>{{ $salary->pay_date }}</td>
                    <td>{{ $salary->status }}</td>
                    <td>
                        <a href="{{ route('salaries.show', $salary) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('salaries.edit', $salary) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('salaries.destroy', $salary) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $salaries->links() }}
@endsection