<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rental extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    /**
     * Get the user that owns the rental
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rental(): BelongsTo
    {
        return $this->belongsTo(Rental::class);
    }
}
