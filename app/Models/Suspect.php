<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suspect extends Model
{
    use HasFactory;

    protected $fillable = [
        'crime_case_id',
        'name',
        'mobile',
        'address',
        'relation',
        'notes',
        'profile_pic',
    ];

    public function crimeCase()
    {
        return $this->belongsTo(CrimeCase::class);
    }

    public function evidence()
    {
        return $this->hasMany(Evidence::class);
    }
}
