<?php

namespace App\Filament\Resources\HouseResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Houses')
                ->value(100)
                ->variant('primary')
                ->icon('heroicon-o-home'),
            Stat::make('Total Rooms')
                ->value(100)
                ->variant('primary')
                ->icon('heroicon-o-home'),
            Stat::make('Total Tenants')
                ->value(100)
                ->variant('primary')
                ->icon('heroicon-o-home'),
            Stat::make('Total Owners')
                ->value(100)
                ->variant('primary')
                ->icon('heroicon-o-home'),
        ];
    }
}
