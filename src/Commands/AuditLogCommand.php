<?php

namespace zoparga\AuditLog\Commands;

use Illuminate\Console\Command;

class AuditLogCommand extends Command
{
    public $signature = 'auditlog';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
