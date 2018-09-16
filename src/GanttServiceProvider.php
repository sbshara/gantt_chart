<?php

namespace sbshara\gantt_chart;

use Illuminate\Support\ServiceProvider;

class GanttServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/assets/css' => public_path('vendor/sbshara/gantt_chart/css'),
        ], 'gantt');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
