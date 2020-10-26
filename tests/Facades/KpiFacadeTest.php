<?php

namespace Tests\Facades;

use Tests\TestCase;
use TylerWoonton\LaravelKpi\Facades\KPI;
use TylerWoonton\LaravelKpi\Models\Kpi as KpiModel;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class KpiFacadeTest extends TestCase
{
    use DatabaseTransactions;

    public function getPackageProviders($app)
    {
        return ['TylerWoonton\LaravelKpi\KpiServiceProvider'];
    }

    public function runMigrations()
    {
        include_once __DIR__ . '/../../migrations/create_kpis_table.php.stub';
        include_once __DIR__ . '/../../migrations/create_kpi_events_table.php.stub';

        (new \CreateKpisTable)->up();
        (new \CreateKpiEventsTable)->up();
    }

    /** @test */
    public function can_store_existing_kpi()
    {
        $this->runMigrations();

        $slug = 'test';
        $data = ['foo' => 'bar'];

        $kpi = KpiModel::create([
            'slug' => $slug
        ]);

        KPI::store($slug, $data);

        $this->assertJson($kpi->events->first()->data);
        $this->assertSame($data, json_decode($kpi->events->first()->data, true));
    }

    /** @test */
    public function can_store_new_kpi()
    {
        $this->runMigrations();

        $slug = 'new';
        $data = ['foo' => 'bar'];

        KPI::store($slug, $data);

        $kpi = KpiModel::where(['slug' => $slug])->first();

        $this->assertJson($kpi->events->first()->data);
        $this->assertSame($data, json_decode($kpi->events->first()->data, true));
    }
}
