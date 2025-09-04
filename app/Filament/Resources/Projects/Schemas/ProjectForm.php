<?php

namespace App\Filament\Resources\Projects\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ProjectForm
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
                        ->maxLength(255)
                        ->live(onBlur: true)
                        ->afterStateUpdated(function (Set $set, $state) {
                            $set('slug', Str::slug($state));
                        })
                        ->unique(ignoreRecord: true)
                        ->required(),
                    TextInput::make('slug')
                    ->maxLength(255)
                    ->unique()
                    ->disabled()
                    ->dehydrated()
                    ->required()
                ])->columns(2),
                TextInput::make('link')
                    ->required(),
                Textarea::make('description')
                ])->columnSpanFull()
            ]);
    }
}
