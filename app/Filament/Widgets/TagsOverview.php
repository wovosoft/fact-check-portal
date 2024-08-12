<?php

namespace App\Filament\Widgets;

use App\Models\Tag;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class TagsOverview extends BaseWidget
{
    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Tag::query()->withCount('incidents')
            )
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('incidents_count')
                    ->label('Total Incidents')
                    ->searchable()
                    ->sortable(),
            ]);
    }
}
