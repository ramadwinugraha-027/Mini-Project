<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class School extends Model
{
    use HasFactory;

    protected $fillable = ['name','address','contact_person',];

    /**
     * Relasi: 1 Sekolah memiliki banyak jadwal distribusi MBG
     */
    public function mbgDistributions(): HasMany
    {
        return $this->hasMany(MbgDistribution::class);
    }

    public function reports(): HasMany
    {
        return $this->hasMany(Report::class);
    }
}
