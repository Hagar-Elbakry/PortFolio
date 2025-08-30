<?php

namespace App\Filament\Resources\Users\Tables;

use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('email'),
                ImageColumn::make('image')
                    ->label('Image')
                    ->disk('public')
                    ->defaultImageUrl(url('storage/images/default.jpg')),
              TextColumn::make('bio')
                  ->label('Bio')
                  ->default('-')
                  ->limit(50),
              TextColumn::make('twitter_url')
                  ->label('Twitter')
                  ->default('-')
                  ->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('github_url')
                ->label('Github')
                ->default('-')
                ->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('linkedin_url')
                ->label('Linkedin')
                ->default('-')
                ->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('created_at')
                ->label('Created at'),
            TextColumn::make('updated_at')
                ->label('Updated at')
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
