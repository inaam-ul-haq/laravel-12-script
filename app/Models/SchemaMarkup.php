<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchemaMarkup extends Model
{
    use HasFactory, HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'schemamarkup_id',
        'schemamarkup_type',
        'type',
        'data',
        'is_active',
    ];

    protected $casts = [
        'data' => 'array',      // JSON ko array banay ga
        'is_active' => 'boolean',
    ];

    /**
     * Polymorphic relation
     */
    public function schemamarkup()
    {
        return $this->morphTo();
    }
}
