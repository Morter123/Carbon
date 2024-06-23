<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calculation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'calculation_date',
        'calculation_data',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getCalculationDateAttribute($value)
    {
        return Carbon::parse($value)->format('d.m.Y');
    }
}