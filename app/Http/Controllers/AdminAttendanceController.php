<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Validation\ValidationException; // Opsional, tapi baik untuk error handling

class AdminAttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::with('user')->paginate(10);
        return view('admin.attendances.index', compact('attendances'));
    }

    public function create()
    {
        $users = User::all();
        return view('admin.attendances.create', compact('users'));
    }

    public function store(Request $request)
    {
        // Validasi data yang masuk
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'date' => 'required|date',
            'check_in_time' => 'nullable|date_format:H:i:s',
            'check_out_time' => 'nullable|date_format:H:i:s|after:check_in_time',
            'type' => 'required|string|in:present,wfo,wfh,leave,sick', // Sesuaikan dengan tipe yang Anda miliki
            'status' => 'required|string|in:present,late,absent,leave,sick', // Sesuaikan dengan status yang Anda miliki
        ]);

        // Buat record absensi baru menggunakan data yang sudah divalidasi
        Attendance::create($validatedData);

        return redirect()->route('admin.attendances.index')
                         ->with('success', 'Attendance created successfully.');
    }

    public function show(Attendance $attendance)
    {
        return view('admin.attendances.show', compact('attendance'));
    }

    public function edit(Attendance $attendance)
    {
        $users = User::all();
        return view('admin.attendances.edit', compact('attendance', 'users'));
    }

    public function update(Request $request, Attendance $attendance)
    {
        // Validasi data yang masuk
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'date' => 'required|date',
            'check_in_time' => 'nullable|date_format:H:i:s',
            'check_out_time' => 'nullable|date_format:H:i:s|after:check_in_time',
            'type' => 'required|string|in:present,wfo,wfh,leave,sick', // Sesuaikan dengan tipe yang Anda miliki
            'status' => 'required|string|in:present,late,absent,leave,sick', // Sesuaikan dengan status yang Anda miliki
        ]);

        // Perbarui record absensi menggunakan data yang sudah divalidasi
        $attendance->update($validatedData);

        return redirect()->route('admin.attendances.index')
                         ->with('success', 'Attendance updated successfully.');
    }

    public function destroy(Attendance $attendance)
    {
        $attendance->delete();

        return redirect()->route('admin.attendances.index')
                         ->with('success', 'Attendance deleted successfully.');
    }
}
