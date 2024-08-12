<?php

namespace App\Filament\Resources\FactCheckResource\Pages;

use App\Filament\Resources\FactCheckResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFactCheck extends EditRecord
{
    protected static string $resource = FactCheckResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
