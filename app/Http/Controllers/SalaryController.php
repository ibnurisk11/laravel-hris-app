<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use App\Models\User;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $salaries = Salary::with('user')->paginate(10);
        return view('salaries.index', compact('salaries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('salaries.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'month' => 'required|string',
            'year' => 'required|integer',
            'basic_salary' => 'required|numeric|min:0',
            'employer_pays_fee' => 'required|numeric|min:0',
            'bonus' => 'required|numeric|min:0',
            'performance_allowance' => 'required|numeric|min:0',
            'overtime' => 'required|numeric|min:0',
            'pph21' => 'required|numeric|min:0',
            'bpjs' => 'required|numeric|min:0',
            'jht' => 'required|numeric|min:0',
            'receivable_employee' => 'required|numeric|min:0',
        ]);

        Salary::create($request->all());

        return redirect()->route('admin.salaries.index')
                         ->with('success', 'Salary record created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Salary $salary)
    {
        return view('salaries.show', compact('salary'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Salary $salary)
    {
        $users = User::all();
        return view('salaries.edit', compact('salary', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Salary $salary)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'month' => 'required|string',
            'year' => 'required|integer',
            'basic_salary' => 'required|numeric|min:0',
            'employer_pays_fee' => 'required|numeric|min:0',
            'bonus' => 'required|numeric|min:0',
            'performance_allowance' => 'required|numeric|min:0',
            'overtime' => 'required|numeric|min:0',
            'pph21' => 'required|numeric|min:0',
            'bpjs' => 'required|numeric|min:0',
            'jht' => 'required|numeric|min:0',
            'receivable_employee' => 'required|numeric|min:0',
        ]);

        $salary->update($request->all());

        return redirect()->route('admin.salaries.index')
                         ->with('success', 'Salary record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Salary $salary)
    {
        $salary->delete();

        return redirect()->route('admin.salaries.index')
                         ->with('success', 'Salary record deleted successfully.');
    }
}