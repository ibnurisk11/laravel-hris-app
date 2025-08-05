<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UserAttendanceController extends Controller
{
    /**
     * Display the attendance page for the authenticated user.
     */
    public function index()
    {
        $attendance = Attendance::where('user_id', auth()->id())
                               ->whereDate('date', today())
                               ->first();

        return view('user.absen', compact('attendance'));
    }

    /**
     * Handle the check-in process.
     */
    public function checkIn()
    {
        $attendance = Attendance::where('user_id', auth()->id())
                               ->whereDate('date', today())
                               ->first();

        if ($attendance) {
            return redirect()->route('user.absen')->with('error', 'Anda sudah check-in hari ini.');
        }

        // Perbaikan: Tambahkan kolom 'type' dan 'status' dengan nilai default
        Attendance::create([
            'user_id' => auth()->id(),
            'date' => today(),
            'check_in_time' => now()->format('H:i:s'),
            'type' => 'present',
            'status' => 'present', // <-- Tambahkan baris ini
        ]);

        return redirect()->route('user.absen')->with('success', 'Check-in berhasil!');
    }

    /**
     * Handle the check-out process.
     */
    public function checkOut()
    {
        $attendance = Attendance::where('user_id', auth()->id())
                               ->whereDate('date', today())
                               ->first();

        if (!$attendance) {
            return redirect()->route('user.absen')->with('error', 'Anda harus check-in terlebih dahulu.');
        }

        if ($attendance->check_out_time) {
            return redirect()->route('user.absen')->with('error', 'Anda sudah check-out hari ini.');
        }

        $attendance->update(['check_out_time' => now()->format('H:i:s')]);

        return redirect()->route('user.absen')->with('success', 'Check-out berhasil!');
    }
}
