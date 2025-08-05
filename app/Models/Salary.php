<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'month',
        'year',
        'basic_salary',
        'employer_pays_fee',
        'bonus',
        'performance_allowance',
        'overtime',
        'pph21',
        'bpjs',
        'jht',
        'receivable_employee',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}