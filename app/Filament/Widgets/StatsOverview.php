<?php

namespace App\Filament\Widgets;

use App\Models\FactCheck;
use App\Models\Incident;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static string  $view            = "filament.widgets.custom-state";
    protected static ?string $pollingInterval = '60s';
    protected static bool    $isLazy          = false;

    protected function getStats(): array
    {
        $incidentsCount  = Incident::count();
        $factChecksCount = FactCheck::count();

        return [
            Stat::make('Incidents', $incidentsCount)
                ->description('Incidents reported')
                ->descriptionIcon('heroicon-m-arrow-trending-up'),
            Stat::make('Fact Checks', $factChecksCount)
                ->description('Fact Checks Reported')
                ->descriptionIcon('heroicon-m-arrow-trending-up'),
        ];
    }
}
