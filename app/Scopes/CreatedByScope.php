<?php

namespace App\Scopes;

use App\Helper\CheckPackageExpiry;
use App\Helper\GenerateSlug;
use Illuminate\Database\Eloquent\Model;

class CreatedByScope
{
    private static function createdBy($model, $cv = null)
    {
        if ($cv == null) {
            $auth = auth()->id() == null ? 1 : auth()->id();
        } else {
            $auth = auth()->id() == null ? null : auth()->id();
        }

        $model->created_by = $auth;
    }

    public static function setCreatedBy(Model $model)
    {
        self::createdBy($model);
    }

    public static function cvCreatedBy(Model $model)
    {
        self::createdBy($model, 'cv');
    }

    public static function setSlug(Model $model)
    {
        $model->slug = GenerateSlug::generate($model->name);
    }

    public static function checkPackageTrailEnds(Model $model)
    {
        $model->trial_ends = CheckPackageExpiry::trialExpireDate($model);
        $model->save();
    }
}
