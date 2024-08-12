<?php

namespace App\Filament\Resources\FactCheckResource\Pages;

use App\Filament\Resources\FactCheckResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFactChecks extends ListRecords
{
    protected static string $resource = FactCheckResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
