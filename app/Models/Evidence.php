<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evidence extends Model
{
    use HasFactory;

    protected $fillable = [
        'crime_case_id',
        'suspect_id',
        'type',
        'notes',
        'points',
        'evidence',
        'image',
    ];

    public function crimeCase()
    {
        return $this->belongsTo(CrimeCase::class);
    }

    public function suspect()
    {
        return $this->belongsTo(Suspect::class);
    }
}
