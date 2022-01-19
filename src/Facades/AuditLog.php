<?php

namespace zoparga\AuditLog\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \zoparga\AuditLog\AuditLog
 */
class AuditLog extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'auditlog';
    }
}
