<?php

namespace App\Filament\Resources\WorksiteResource\Pages;

use App\Filament\Resources\WorksiteResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWorksites extends ListRecords
{
    protected static string $resource = WorksiteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
