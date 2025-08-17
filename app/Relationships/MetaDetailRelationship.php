<?php

namespace App\Relationships;

use App\Models\MetaDetail;
use Illuminate\Database\Eloquent\Relations\MorphOne;

trait MetaDetailRelationship
{
    public function meta_detail(): MorphOne
    {
        return $this->morphOne(MetaDetail::class, 'metadetail');
    }
}
