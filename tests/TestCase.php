<?php

declare(strict_types=1);

namespace Misaf\VendraActivityLog\Tests;

use Illuminate\Support\Facades\Http;
use Misaf\VendraActivityLog\Providers\ActivityLogServiceProvider;
use Orchestra\Testbench\TestCase as OrchestraTestCase;
use Override;
use Spatie\Activitylog\ActivitylogServiceProvider as SpatieActivitylogServiceProvider;
use Spatie\Activitylog\Models\Activity;

abstract class TestCase extends OrchestraTestCase
{
    #[Override]
    protected function defineDatabaseMigrations(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
    }

    #[Override]
    protected function setUp(): void
    {
        parent::setUp();

        Http::preventStrayRequests();
    }

    #[Override]
    protected function getEnvironmentSetUp($app): void
    {
        $app['config']->set('activitylog.enabled', true);
        $app['config']->set('activitylog.activity_model', Activity::class);
        $app['config']->set('activitylog.table_name', 'activity_log');
        $app['config']->set('activitylog.default_log_name', 'default');
    }

    protected function getPackageProviders($app): array
    {
        return [
            SpatieActivitylogServiceProvider::class,
            ActivityLogServiceProvider::class,
        ];
    }
}
