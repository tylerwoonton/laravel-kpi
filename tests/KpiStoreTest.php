<?php

namespace Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use TylerWoonton\LaravelKpi\KpiStore;
use TylerWoonton\LaravelKpi\Models\Kpi;

class KpiStoreTest extends TestCase
{
    use RefreshDatabase;

    public function getPackageProviders($app)
    {
        return ['TylerWoonton\LaravelKpi\KpiServiceProvider'];
    }

    public function setUp(): void
    {
        parent::setUp();

        include_once __DIR__ . '/../migrations/create_kpis_table.php.stub';
        include_once __DIR__ . '/../migrations/create_kpi_events_table.php.stub';

        (new \CreateKpisTable)->up();
        (new \CreateKpiEventsTable)->up();
    }

    /** @test */
    public function can_store_existing_kpi()
    {
        $slug = 'test';
        $data = ['foo' => 'bar'];

        $kpi = Kpi::create([
            'slug' => $slug
        ]);

        $kpiStore = new KpiStore;
        $kpiStore->store($slug, $data);

        $this->assertJson($kpi->events->first()->data);
        $this->assertSame($data, json_decode($kpi->events->first()->data, true));
    }

    /** @test */
    public function can_store_new_kpi()
    {
        $slug = 'new';
        $data = ['foo' => 'bar'];

        $kpiStore = new KpiStore;
        $kpiStore->store($slug, $data);

        $kpi = Kpi::where(['slug' => $slug])->first();

        $this->assertJson($kpi->events->first()->data);
        $this->assertSame($data, json_decode($kpi->events->first()->data, true));
    }
}
