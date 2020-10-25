<?php

namespace TylerWoonton\LaravelKpi\Models;

use Illuminate\Database\Eloquent\Model;

class Kpi extends Model
{
    public $guarded = [];

    /**
     * Return events belonging to this model
     *
     * @return HasMany
     */
    public function events()
    {
        return $this->hasMany(KpiEvent::class, 'kpi_id', 'id');
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
        return config('kpi.database.tables.kpis', 'laravel_kpis');
    }
}
