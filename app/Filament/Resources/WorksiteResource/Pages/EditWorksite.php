<?php

namespace App\Filament\Resources\WorksiteResource\Pages;

use App\Filament\Resources\WorksiteResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWorksite extends EditRecord
{
    protected static string $resource = WorksiteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
