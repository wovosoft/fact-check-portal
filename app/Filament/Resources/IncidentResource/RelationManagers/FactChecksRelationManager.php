<?php

namespace App\Filament\Resources\IncidentResource\RelationManagers;

use App\Models\FactCheck;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class FactChecksRelationManager extends RelationManager
{
    protected static string $relationship = 'factChecks';


    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DatePicker::make('fact_check_date')
                    ->label('Fact Check Date')
                    ->required(),
                Forms\Components\TextInput::make('source')
                    ->label('Source'),
                Forms\Components\MarkdownEditor::make('details')
                    ->label('Details')
                    ->columnSpanFull(),
                Forms\Components\MarkdownEditor::make('verdict')
                    ->label('Verdict')
                    ->columnSpanFull(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('id')
            ->defaultSort('fact_check_date', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('id'),
                Tables\Columns\TextColumn::make('fact_check_date')
                    ->sortable()
                    ->searchable()
                    ->date(),
                Tables\Columns\TextColumn::make('source')
                    ->searchable()
                    ->getStateUsing(fn(FactCheck $record) => str($record->source)->limit(50)),
                Tables\Columns\TextColumn::make('verdict')
                    ->getStateUsing(fn(FactCheck $record) => str($record->verdict)->limit(50))
                    ->searchable(),
                Tables\Columns\TextColumn::make('details')
                    ->searchable()
                    ->getStateUsing(fn(FactCheck $record) => str($record->details)->limit(50)),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),

            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->mutateFormDataUsing(function ($data) {
                        $data['user_id'] = auth()->id();
                        return $data;
                    }),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->modalHeading('View Fact Check Details'),
                Tables\Actions\EditAction::make()
                    ->mutateFormDataUsing(function ($data) {
                        $data['user_id'] = auth()->id();
                        return $data;
                    }),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
