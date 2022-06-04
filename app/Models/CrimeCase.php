<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrimeCase extends Model
{
    use HasFactory;

    protected $fillable = [
        'case_name',
        'notes'
    ];

    public function officerNames()
    {
        return CaseOffice::where('crime_case_id', $this->id)->get();
    }

    public function officerCount()
    {
        return CaseOffice::where('crime_case_id', $this->id)->count();
    }

    public function suspects()
    {
        return $this->hasMany(Suspect::class);
    }

    public function evidences()
    {
        return $this->hasMany(Evidence::class);
    }
}
