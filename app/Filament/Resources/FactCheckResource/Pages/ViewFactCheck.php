<?php

namespace App\Filament\Resources\FactCheckResource\Pages;

use App\Filament\Resources\FactCheckResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewFactCheck extends ViewRecord
{
    protected static string $resource = FactCheckResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
