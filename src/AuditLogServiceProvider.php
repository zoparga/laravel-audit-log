<?php

namespace zoparga\AuditLog;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use zoparga\AuditLog\Commands\AuditLogCommand;

class AuditLogServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('auditlog')
            //->hasConfigFile()
            //->hasViews()
            ->hasMigration('create_auditlog_table')
            //->hasCommand(AuditLogCommand::class)
            ;
    }
}
