<?php

namespace Corals\Modules\Utility\Webhook\Providers;

use Corals\Foundation\Providers\BaseUninstallModuleServiceProvider;
use Corals\Modules\Utility\Webhook\database\migrations\CreateWebhooksTable;
use Corals\Modules\Utility\Webhook\database\seeds\UtilityWebhookDatabaseSeeder;

class UninstallModuleServiceProvider extends BaseUninstallModuleServiceProvider
{
    protected $migrations = [
        CreateWebhooksTable::class,
    ];

    protected function providerBooted()
    {
        $this->dropSchema();

        $utilityWebhookDatabaseSeeder = new UtilityWebhookDatabaseSeeder();

        $utilityWebhookDatabaseSeeder->rollback();
    }
}
