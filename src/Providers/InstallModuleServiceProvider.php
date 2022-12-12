<?php

namespace Corals\Modules\Utility\Webhook\Providers;

use Corals\Foundation\Providers\BaseInstallModuleServiceProvider;
use Corals\Modules\Utility\Webhook\database\seeds\UtilityWebhookDatabaseSeeder;
use Corals\Modules\Utility\Webhook\database\migrations\CreateWebhooksTable;

class InstallModuleServiceProvider extends BaseInstallModuleServiceProvider
{
    protected $migrations = [
        CreateWebhooksTable::class,
    ];

    protected function providerBooted()
    {
        $this->createSchema();

        $utilityWebhookDatabaseSeeder = new UtilityWebhookDatabaseSeeder();

        $utilityWebhookDatabaseSeeder->run();
    }
}
