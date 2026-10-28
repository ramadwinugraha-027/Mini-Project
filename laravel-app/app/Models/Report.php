<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Report extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','school_id','mbg_distribution_id','incident_date','symptoms_description','affected_count',
    'evidence_path','status','notes','forwarded_to',];

    protected function casts(): array
    {
        return [
            'incident_date' => 'date',
            'affected_count' => 'integer',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class);
    }

    public function mbgDistribution(): BelongsTo
    {
        return $this->belongsTo(MbgDistribution::class);
    }

    public function statusLogs(): HasMany
    {
        return $this->hasMany(ReportStatusLog::class);
    }
}