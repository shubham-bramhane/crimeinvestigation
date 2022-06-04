<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseHistory extends Model
{
    use HasFactory;

    protected $fillable = ['crime_case_id', 'user_id', 'notes'];

    public function crimeCase()
    {
        return $this->belongsTo(CrimeCase::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
