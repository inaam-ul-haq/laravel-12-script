<?php

namespace App\Relationships;

use App\Models\SchemaMarkup;
use Illuminate\Database\Eloquent\Relations\MorphOne;

trait SchemaRelationship
{
    public function schema(): MorphOne
    {
        return $this->morphOne(SchemaMarkup::class, 'schemamarkup');
    }
}
