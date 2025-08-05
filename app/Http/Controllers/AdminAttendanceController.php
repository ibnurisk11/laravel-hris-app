<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminAttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::with('user')->paginate(10);
        return view('admin.attendances.index', compact('attendances')); // Perubahan di sini
    }

    public function create()
    {
        $users = User::all();
        return view('admin.attendances.create', compact('users')); // Perubahan di sini
    }

    public function store(Request $request)
    {
        // ...
        Attendance::create($data);

        return redirect()->route('admin.attendances.index')
                         ->with('success', 'Attendance created successfully.');
    }

    public function show(Attendance $attendance)
    {
        return view('admin.attendances.show', compact('attendance')); // Perubahan di sini
    }

    public function edit(Attendance $attendance)
    {
        $users = User::all();
        return view('admin.attendances.edit', compact('attendance', 'users')); // Perubahan di sini
    }

    public function update(Request $request, Attendance $attendance)
    {
        // ...
        $attendance->update($data);

        return redirect()->route('admin.attendances.index')
                         ->with('success', 'Attendance updated successfully.');
    }

    public function destroy(Attendance $attendance)
    {
        // ...
        $attendance->delete();

        return redirect()->route('admin.attendances.index')
                         ->with('success', 'Attendance deleted successfully.');
    }
}