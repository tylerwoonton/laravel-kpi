<?php

namespace TylerWoonton\LaravelKpi\Models;

use TylerWoonton\LaravelKpi\Models\Kpi;
use Illuminate\Database\Eloquent\Model;

class KpiEvent extends Model
{
    public $guarded = [];

    /**
     * Get the KPI for this event
     *
     * @return Kpi
     */
    public function kpi()
    {
        return $this->belongsTo(Kpi::class, 'kpi_id', 'id');
    }

    /**
     * Get the current connection name for the model.
     *
     * @return string
     */
    public function getConnectionName()
    {
        return config('kpi.database.connection', '');
    }

    /**
     * Get the table associated with the model.
     *
     * @return string
     */
    public function getTable()
    {
        return config('kpi.database.tables.kpi_events', 'laravel_kpi_events');
    }
}
