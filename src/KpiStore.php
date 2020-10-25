<?php

namespace TylerWoonton\LaravelKpi;

use TylerWoonton\LaravelKpi\Exceptions\KpiNotFoundException;
use TylerWoonton\LaravelKpi\Models\Kpi;

class KpiStore
{
    public function store($slug, $data = [])
    {
        $kpi = Kpi::where('slug', $slug)->first();
        if (!$kpi) {
            throw new KpiNotFoundException($slug); 
        }

        //
    }
}
