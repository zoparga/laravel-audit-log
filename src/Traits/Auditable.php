<?php

namespace zoparga\AuditLog\Traits;

use Illuminate\Database\Eloquent\Model;
use zoparga\AuditLog\Models\AuditLog;

trait Auditable
{
    public static function bootAuditable()
    {
        static::created(function (Model $model) {
            self::audit('created', $model);
        });

        static::updated(function (Model $model) {
            self::auditUpdate('updated', $model);
        });

        static::deleted(function (Model $model) {
            self::audit('deleted', $model);
        });
    }

    protected static function audit($description, $model)
    {
        $properties = collect([
            'original' => $model ?? null,
            'updated' => $model->getChanges() ?? null,
        ]);
        AuditLog::create([
            'description' => $description,
            'subject_id' => $model->id ?? null,
            'subject_type' => get_class($model) ?? null,
            'user_id' => auth()->id() ?? null,
            'properties' => $properties ?? null,
            'host' => request()->ip() ?? null,
        ]);
    }

    protected static function auditUpdate($description, $model)
    {
        $properties = collect([
            'original' => $model->getOriginal(),
            'updated' => $model->getChanges(),
        ]);
        AuditLog::create([
            'description' => $description,
            'subject_id' => $model->id ?? null,
            'subject_type' => get_class($model) ?? null,
            'user_id' => auth()->id() ?? null,
            'properties' => $properties ?? null,
            'host' => request()->ip() ?? null,
        ]);
    }
}
