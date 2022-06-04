<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrimeResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'crime_case_id',
        'suspect_id',
        'notes',
    ];
}
