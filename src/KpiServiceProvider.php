<?php

namespace TylerWoonton\LaravelKpi;

use TylerWoonton\LaravelKpi\KpiStore;
use Illuminate\Support\ServiceProvider;

class KpiServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        
        $this->publishes(
            [
                __DIR__.'/../config/kpi.php' => config_path('kpi.php'),
            ],
            'laravel-kpi-config'
        );
        
        if (!class_exists('CreateKpisTable')) {
            $this->publishes(
                [
                    __DIR__ . '/../database/migrations/create_kpis_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_kpis_table.php')
                ],
                'laravel-kpi-migrations'
            );
        }

        if (!class_exists('CreateKpiEventsTable')) {
            $this->publishes(
                [
                    __DIR__ . '/../database/migrations/create_kpi_events_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_kpi_events_table.php')
                ],
                'laravel-kpi-migrations'
            );
        }
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/kpi.php', 'kpi'
        );

        $this->app->bind('kpi', function ($app) {
            return new KpiStore();
        });
    }
}
