<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FactCheckResource\Pages;
use App\Filament\Resources\FactCheckResource\RelationManagers;
use App\Models\FactCheck;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FactCheckResource extends Resource
{
    protected static ?string $model = FactCheck::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('incident_id')
                    ->relationship('incident', 'title')
                    ->required(),
                Forms\Components\DatePicker::make('fact_check_date'),
                Forms\Components\TextInput::make('source'),
                Forms\Components\TextInput::make('verdict'),
                Forms\Components\Textarea::make('details')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('incident.title')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('fact_check_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('source')
                    ->searchable(),
                Tables\Columns\TextColumn::make('verdict')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFactChecks::route('/'),
            'create' => Pages\CreateFactCheck::route('/create'),
            'view' => Pages\ViewFactCheck::route('/{record}'),
            'edit' => Pages\EditFactCheck::route('/{record}/edit'),
        ];
    }
}
