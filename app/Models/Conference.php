<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Conference extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'lecturers',
        'date',
        'time',
        'address',
        'status',
    ];

    protected $casts = [
        'date' => 'date',
    ];

    /**
     * Get users registered to this conference
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'users_conferences');
    }

    /**
     * Check if conference is planned
     */
    public function isPlanned(): bool
    {
        return $this->status === 'planned';
    }

    /**
     * Check if conference is completed
     */
    public function isCompleted(): bool
    {
        return $this->status === 'completed';
    }
}
