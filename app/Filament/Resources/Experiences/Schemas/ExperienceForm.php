<?php

namespace App\Filament\Resources\Experiences\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ExperienceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Experience Information')
                ->schema([
                    Group::make()
                    ->schema([
                        TextInput::make('name')
                        ->required()
                        ->unique(ignoreRecord: true)
                        ->maxLength(255)
                        ->live(onBlur: true)
                        ->afterStateUpdated(function (Set $set, $state) {
                                $set('slug', Str::slug($state));
                        }),
                        TextInput::make('slug')
                        ->required()
                       ->unique()
                        ->disabled()
                        ->dehydrated()
                        ->maxLength(255),
                    ])->columns(2),
                    Textarea::make('description'),
                    Group::make()
                    ->schema([
                        DateTimePicker::make('created_at')
                        ->required()
                        ->timezone('Africa/Cairo')
                        ->default(now())
                        ->hiddenOn('edit'),
                        DateTimePicker::make('updated_at')
                        ->required()
                        ->after('created_at')
                        ->timezone('Africa/Cairo')
                        ->default(now())
                        ->hiddenOn('create'),
                    ])->columns(2),
                ])->columnSpanFull(),

                Section::make('Experience Details')
                    ->schema([
                        Group::make()
                            ->schema([
                                TextInput::make('Company')
                                    ->required()
                                    ->maxLength(255),
                                TextInput::make('location')
                                    ->required()
                                    ->maxLength(255),
                            ])->columns(2),
                        Group::make()
                            ->schema([
                               TextInput::make('start_year')
                                ->required(),
                               TextInput::make('end_year')
                               ->required(),
                            ])->columns(2),
                    ])->columnSpanFull()
            ]);
    }
}
