<?php

namespace App\Filament\Resources\Experiences\Tables;

use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ExperiencesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                ->searchable(),
                TextColumn::make('description')
                ->limit(50),
                TextColumn::make('company')
                ->searchable(),
                TextColumn::make('location')
                ->searchable(),
                TextColumn::make('start_year')
                ->searchable(),
                TextColumn::make('end_year')
                ->searchable(),
                TextColumn::make('created_at')
                ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ActionGroup::make([
                    ViewAction::make(),
                    EditAction::make(),
                    DeleteAction::make(),
                ])->tooltip('Actions'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
