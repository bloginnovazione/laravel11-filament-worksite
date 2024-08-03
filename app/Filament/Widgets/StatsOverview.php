<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Worksite;
use App\Models\House;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Cantieri: ', Worksite::get()->count())
                ->icon('heroicon-o-rectangle-stack'),
            Stat::make('Immobili: ', House::get()->count())
                ->icon('heroicon-o-home-modern'),
            Stat::make('Immobili Disponibili : ', House::where('state', '=', 'disponibile')->get()->count())
                ->icon('heroicon-o-home-modern'),
            Stat::make('Immobili Prenotati : ', House::where('state', '=', 'prenotato')->get()->count())
                ->icon('heroicon-o-home-modern'),
            Stat::make('Immobili Sospesi : ', House::where('state', '=', 'sospeso')->get()->count())
                ->icon('heroicon-o-home-modern'),
            Stat::make('Immobili Venduti : ', House::where('state', '=', 'venduto')->get()->count())
                ->icon('heroicon-o-home-modern'),
        ];
    }
}
