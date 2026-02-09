<?php

declare(strict_types=1);

namespace Misaf\VendraActivityLog\Tests;

use Illuminate\Support\Facades\Http;
use Misaf\VendraActivityLog\ActivityLogServiceProvider;
use Orchestra\Testbench\TestCase as OrchestraTestCase;
use Override;

abstract class TestCase extends OrchestraTestCase
{
    #[Override]
    protected function setUp(): void
    {
        parent::setUp();

        Http::preventStrayRequests();
    }

    protected function getPackageProviders($app): array
    {
        return [
            ActivityLogServiceProvider::class,
        ];
    }
}
