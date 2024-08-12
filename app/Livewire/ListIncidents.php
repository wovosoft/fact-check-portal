<?php

namespace App\Livewire;

use App\Models\Incident;

use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Filament\Tables;

class ListIncidents extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;


    public function table(Table $table): Table
    {
        return $table
            ->query(Incident::query())
            ->contentGrid([
                'md' => 2,
                'xl' => 3,
            ])
            ->columns([
                Tables\Columns\Layout\Stack::make([
                    Tables\Columns\TextColumn::make('title')
                        ->size('xl')
                        ->extraAttributes([
                            'class' => 'font-semibold',
                        ])
                        ->searchable(),
                    Tables\Columns\TextColumn::make('date')
                        ->date()
                        ->sortable(),

                    Tables\Columns\TextColumn::make('tags.name')
                        ->sortable(),
                    Tables\Columns\TextColumn::make('created_at')
                        ->prefix('Created at: ')
                        ->dateTime()
                        ->sortable()
                        ->toggleable(),
                    Tables\Columns\TextColumn::make('updated_at')
                        ->prefix('Updated at: ')
                        ->dateTime()
                        ->sortable()
                        ->toggleable(isToggledHiddenByDefault: true),
                ])
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('tags')
                    ->relationship('tags', 'name')
                    ->searchable()
                    ->preload()
                    ->multiple(),
            ], Tables\Enums\FiltersLayout::AboveContent)
            ->actions([
                Tables\Actions\Action::make('view-record')
                    ->label('Details')
                    ->icon('heroicon-o-eye')
                    ->url(fn(Incident $incident) => route('incidents.show', ['incident' => $incident->id])),
            ]);
    }

    public function render(): View
    {
        return view('livewire.list-incidents');
    }
}
