<?php

namespace App\Filament\Resources\Skills\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class SkillForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                ->schema([
                    Group::make()
                    ->schema([
                            TextInput::make('name')
                                ->unique(ignoreRecord: true)
                              ->maxLength(255)
                                ->required()
                                ->live(onBlur: true)
                                ->afterStateUpdated(function (Set $set, $state) {
                                    $set('slug', Str::slug($state));
                                }),
                           TextInput::make('slug')
                                ->unique()
                               ->required()
                               ->maxLength(255)
                               ->disabled()
                               ->dehydrated(),
                    ])->columns(2),
                    Group::make()
                    ->schema([
                        DateTimePicker::make('created_at')
                        ->timezone('Africa/Cairo')
                        ->default(now())
                       ->hiddenOn('edit')
                        ->required(),
                        DateTimePicker::make('updated_at')
                        ->timezone('Africa/Cairo')
                        ->default(now())
                        ->hiddenOn('create')
                        ->after('created_at')
                        ->required(),
                    ])->columns(2),
                ])->columnSpanFull()
            ]);
    }
}
