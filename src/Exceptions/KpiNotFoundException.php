<?php

namespace TylerWoonton\LaravelKpi\Exceptions;

use Exception;

class KpiNotFoundException extends Exception
{
    public function __construct($slug)
    {
        parent::__construct("The requested KPI $slug cannot be found.");
    }
}
