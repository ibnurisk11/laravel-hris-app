@extends('layouts.app')

@section('content')
    <h2 class="mt-4">Edit Salary Record</h2>
    <form action="{{ route('salaries.update', $salary) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="user_id" class="form-label">User</label>
                <select class="form-control" id="user_id" name="user_id">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" @selected(old('user_id', $salary->user_id) == $user->id)>{{ $user->name }}</option>
                    @endforeach
                </select>
                @error('user_id')<div class="text-danger mt-2">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-3 mb-3">
                <label for="month" class="form-label">Month</label>
                <input type="text" class="form-control" id="month" name="month" value="{{ old('month', $salary->month) }}">
                @error('month')<div class="text-danger mt-2">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-3 mb-3">
                <label for="year" class="form-label">Year</label>
                <input type="number" class="form-control" id="year" name="year" value="{{ old('year', $salary->year) }}">
                @error('year')<div class="text-danger mt-2">{{ $message }}</div>@enderror
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="basic_salary" class="form-label">Basic Salary</label>
                <input type="number" step="0.01" class="form-control" id="basic_salary" name="basic_salary" value="{{ old('basic_salary', $salary->basic_salary) }}">
                @error('basic_salary')<div class="text-danger mt-2">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="employer_pays_fee" class="form-label">Employer Pays Fee</label>
                <input type="number" step="0.01" class="form-control" id="employer_pays_fee" name="employer_pays_fee" value="{{ old('employer_pays_fee', $salary->employer_pays_fee) }}">
                @error('employer_pays_fee')<div class="text-danger mt-2">{{ $message }}</div>@enderror
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="bonus" class="form-label">Bonus</label>
                <input type="number" step="0.01" class="form-control" id="bonus" name="bonus" value="{{ old('bonus', $salary->bonus) }}">
                @error('bonus')<div class="text-danger mt-2">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="performance_allowance" class="form-label">Performance Allowance</label>
                <input type="number" step="0.01" class="form-control" id="performance_allowance" name="performance_allowance" value="{{ old('performance_allowance', $salary->performance_allowance) }}">
                @error('performance_allowance')<div class="text-danger mt-2">{{ $message }}</div>@enderror
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="overtime" class="form-label">Overtime</label>
                <input type="number" step="0.01" class="form-control" id="overtime" name="overtime" value="{{ old('overtime', $salary->overtime) }}">
                @error('overtime')<div class="text-danger mt-2">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="pph21" class="form-label">PPH21</label>
                <input type="number" step="0.01" class="form-control" id="pph21" name="pph21" value="{{ old('pph21', $salary->pph21) }}">
                @error('pph21')<div class="text-danger mt-2">{{ $message }}</div>@enderror
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="bpjs" class="form-label">BPJS</label>
                <input type="number" step="0.01" class="form-control" id="bpjs" name="bpjs" value="{{ old('bpjs', $salary->bpjs) }}">
                @error('bpjs')<div class="text-danger mt-2">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-4 mb-3">
                <label for="jht" class="form-label">JHT</label>
                <input type="number" step="0.01" class="form-control" id="jht" name="jht" value="{{ old('jht', $salary->jht) }}">
                @error('jht')<div class="text-danger mt-2">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-4 mb-3">
                <label for="receivable_employee" class="form-label">Receivable Employee</label>
                <input type="number" step="0.01" class="form-control" id="receivable_employee" name="receivable_employee" value="{{ old('receivable_employee', $salary->receivable_employee) }}">
                @error('receivable_employee')<div class="text-danger mt-2">{{ $message }}</div>@enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.salaries.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection