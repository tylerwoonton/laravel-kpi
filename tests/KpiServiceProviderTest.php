<?php

namespace Tests;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use TylerWoonton\LaravelKpi\KpiServiceProvider;
use TylerWoonton\LaravelKpi\KpiStore;

class KpiServiceProviderTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function configures_package()
    {
        $this->app->register(KpiServiceProvider::class);
        $this->assertNotNull(config('kpi'));
    }

    /** @test */
    public function binds_kpi_store()
    {
        $this->app->register(KpiServiceProvider::class);
        $this->assertInstanceOf(KpiStore::class, $this->app->make('kpi'));
    }
}
