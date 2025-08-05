@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Absensi Harian</h1>
    </div>

    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <!-- Menampilkan pesan sukses atau error dari controller -->
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                    
                    <h5 class="card-title">Status Absensi Hari Ini</h5>
                    <p class="card-text">
                        Tanggal: **{{ now()->translatedFormat('l, d F Y') }}**
                    </p>

                    @if ($attendance)
                        <!-- Jika sudah check-in -->
                        <div class="mt-4">
                            <p class="lead">Anda sudah check-in pada pukul **{{ $attendance->check_in_time }}**.</p>
                            
                            @if ($attendance->check_out_time)
                                <!-- Jika sudah check-out -->
                                <p class="lead text-success">Anda sudah check-out pada pukul **{{ $attendance->check_out_time }}**.</p>
                                <button class="btn btn-secondary btn-lg" disabled>Absensi Selesai</button>
                            @else
                                <!-- Tombol untuk check-out -->
                                <form action="{{ route('user.absen.checkout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-lg mt-3">
                                        <i class="bi bi-box-arrow-right me-2"></i> Check-out
                                    </button>
                                </form>
                            @endif
                        </div>
                    @else
                        <!-- Jika belum check-in -->
                        <div class="mt-4">
                            <p class="lead">Anda belum melakukan check-in hari ini.</p>
                            <!-- Tombol untuk check-in -->
                            <form action="{{ route('user.absen.checkin') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-lg mt-3">
                                    <i class="bi bi-box-arrow-in-right me-2"></i> Check-in
                                </button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
