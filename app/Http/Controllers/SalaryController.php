<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller; // Pastikan ini ada
use Carbon\Carbon; // Tambahkan ini untuk mengelola tanggal/waktu

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $salaries = Salary::with('user')->paginate(10);
        return view('admin.salaries.index', compact('salaries')); // Sesuaikan path view jika perlu
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all(); // Titik koma ditambahkan
        $months = [ // Daftar bulan untuk dropdown
            'January' => 1, 'February' => 2, 'March' => 3, 'April' => 4,
            'May' => 5, 'June' => 6, 'July' => 7, 'August' => 8,
            'September' => 9, 'October' => 10, 'November' => 11, 'December' => 12
        ];
        return view('admin.salaries.create', compact('users', 'months'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'month' => 'required|string', // Tetap string karena dari form input
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

        // Konversi nama bulan (string) menjadi angka bulan (integer)
        $validatedData['month'] = Carbon::parse($validatedData['month'])->month;

        Salary::create($validatedData); // Gunakan $validatedData setelah konversi

        return redirect()->route('admin.salaries.index')
                         ->with('success', 'Salary record created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Salary $salary)
    {
        return view('admin.salaries.show', compact('salary')); // Sesuaikan path view jika perlu
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Salary $salary)
    {
        $users = User::all();
        $months = [ // Daftar bulan untuk dropdown
            'January' => 1, 'February' => 2, 'March' => 3, 'April' => 4,
            'May' => 5, 'June' => 6, 'July' => 7, 'August' => 8,
            'September' => 9, 'October' => 10, 'November' => 11, 'December' => 12
        ];
        return view('admin.salaries.edit', compact('salary', 'users', 'months'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Salary $salary)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'month' => 'required|string', // Tetap string karena dari form input
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

        // Konversi nama bulan (string) menjadi angka bulan (integer)
        $validatedData['month'] = Carbon::parse($validatedData['month'])->month;

        $salary->update($validatedData); // Gunakan $validatedData setelah konversi

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
