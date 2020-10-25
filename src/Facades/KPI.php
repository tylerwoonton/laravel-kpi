<?php 

namespace TylerWoonton\LaravelKpi\Facades;

use Illuminate\Support\Facades\Facade;

class KPI extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'kpi'; 
    }
}
