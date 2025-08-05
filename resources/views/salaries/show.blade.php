@extends('layouts.app')

@section('content')
    <h2 class="mt-4">Salary Details</h2>
    <div class="card">
        <div class="card-body">
            @php
                $total_allowance = $salary->employer_pays_fee + $salary->bonus + $salary->performance_allowance + $salary->overtime;
                $total_deduction = $salary->pph21 + $salary->bpjs + $salary->jht + $salary->receivable_employee;
                $net_salary = $salary->basic_salary + $total_allowance - $total_deduction;
            @endphp
            <p><strong>User:</strong> {{ $salary->user->name ?? 'N/A' }}</p>
            <p><strong>Month/Year:</strong> {{ $salary->month }} {{ $salary->year }}</p>
            <hr>
            <h4>Earnings</h4>
            <p><strong>Basic Salary:</strong> Rp {{ number_format($salary->basic_salary, 2, ',', '.') }}</p>
            <p><strong>Employer Pays Fee:</strong> Rp {{ number_format($salary->employer_pays_fee, 2, ',', '.') }}</p>
            <p><strong>Bonus:</strong> Rp {{ number_format($salary->bonus, 2, ',', '.') }}</p>
            <p><strong>Performance Allowance:</strong> Rp {{ number_format($salary->performance_allowance, 2, ',', '.') }}</p>
            <p><strong>Overtime:</strong> Rp {{ number_format($salary->overtime, 2, ',', '.') }}</p>
            <p><strong>Total Earnings:</strong> Rp {{ number_format($salary->basic_salary + $total_allowance, 2, ',', '.') }}</p>
            <hr>
            <h4>Deductions</h4>
            <p><strong>PPH21:</strong> Rp {{ number_format($salary->pph21, 2, ',', '.') }}</p>
            <p><strong>BPJS:</strong> Rp {{ number_format($salary->bpjs, 2, ',', '.') }}</p>
            <p><strong>JHT:</strong> Rp {{ number_format($salary->jht, 2, ',', '.') }}</p>
            <p><strong>Receivable Employee:</strong> Rp {{ number_format($salary->receivable_employee, 2, ',', '.') }}</p>
            <p><strong>Total Deductions:</strong> Rp {{ number_format($total_deduction, 2, ',', '.') }}</p>
            <hr>
            <h3><strong>Net Salary:</strong> Rp {{ number_format($net_salary, 2, ',', '.') }}</h3>
        </div>
    </div>
    <a href="{{ route('admin.salaries.index') }}" class="btn btn-secondary mt-3">Back to List</a>
@endsection