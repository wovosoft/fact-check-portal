<?php

namespace App\Filament\Resources\IncidentResource\RelationManagers;

use App\Enums\IncidentMediaType;
use App\Models\IncidentMedia;
use Filament\Actions\Action;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;

class MediasRelationManager extends RelationManager
{
    protected static string $relationship = 'medias';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('type')
                    ->required()
                    ->enum(IncidentMediaType::class)
                    ->options([
                        IncidentMediaType::Url->value      => 'URL',
                        IncidentMediaType::Video->value    => 'Video',
                        IncidentMediaType::Embed->value    => 'Embed',
                        IncidentMediaType::External->value => 'External',
                        IncidentMediaType::Document->value => 'Document',
                    ])
                    ->reactive(),

                Forms\Components\TextInput::make('path')
                    ->columnSpanFull()
                    ->url()
                    ->placeholder('URL')
                    ->hidden(fn(Forms\Get $get) => !in_array($get('type'), [
                        IncidentMediaType::Url->value,
                        IncidentMediaType::Embed->value,
                        IncidentMediaType::External->value,
                    ])),

                Forms\Components\FileUpload::make('path')
                    ->columnSpanFull()
                    ->reorderable()
                    ->hidden(fn(Forms\Get $get) => !in_array($get('type'), [
                        IncidentMediaType::Document->value,
                        IncidentMediaType::Video->value,
                    ])),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('id')
            ->columns([
                Tables\Columns\TextColumn::make('id'),
                Tables\Columns\TextColumn::make('path'),
                Tables\Columns\TextColumn::make('created_at')
                    ->date(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\Action::make('view')
                    ->label('View')
                    ->icon('heroicon-o-eye')
                    ->url(
                        function (IncidentMedia $record) {
                            if ($record->type->isLocalFile()) {
                                return Storage::url($record->path);
                            }
                            return Storage::url($record->path);
                        },
                        shouldOpenInNewTab: true
                    ),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
