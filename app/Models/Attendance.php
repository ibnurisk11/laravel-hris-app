<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    // Tentukan kolom-kolom yang dapat diisi
    protected $fillable = [
        'user_id',
        'date',
        'type',
        'status',
        'description',
        'file',
        'check_in_time',
        'check_out_time',
    ];

    // Definisikan relasi ke model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}