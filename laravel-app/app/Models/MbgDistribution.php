<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MbgDistribution extends Model
{
    use HasFactory;

    protected $table = 'mbg_distributions';

    protected $fillable = [
        'school_id',
        'distribution_date',
        'meal_time',
        'menu_description',
        'provider_name',
    ];

    protected function casts(): array
    {
        return [
            'distribution_date' => 'date',
        ];
    }

    /**
     * Relasi: Setiap distribusi MBG terikat pada 1 sekolah
     */
    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class);
    }
}