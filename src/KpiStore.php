<?php

namespace TylerWoonton\LaravelKpi;

use TylerWoonton\LaravelKpi\Models\Kpi;
use TylerWoonton\LaravelKpi\Exceptions\KpiNotFoundException;

class KpiStore
{
    public function store($slug, $data = [])
    {
        $kpi = Kpi::firstOrCreate(['slug' => $slug]);
        if (!$kpi) {
            throw new KpiNotFoundException($slug);
        }

        return $kpi->events()->create([
            'kpi_id' => $kpi->id,
            'data' => json_encode($data)
        ]);
    }
}
