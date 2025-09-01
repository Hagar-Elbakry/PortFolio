<?php

namespace App\Filament\Resources\Education\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class EducationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                ->schema([
                    Group::make()
                    ->schema([
                        TextInput::make('university')
                            ->label('University')
                            ->required(),
                        TextInput::make('location')
                        ->label('Location')
                    ])->columns(2),
                     Group::make()
                         ->schema([
                             TextInput::make('field_of_study')
                                 ->label('Field of Study'),
                             TextInput::make('degree')
                                 ->label('Degree')
                                 ->required(),
                         ])->columns(2),
                    Group::make()
                    ->schema([
                        TextInput::make('start_year')
                        ->label('Start Year')
                        ->required(),
                        TextInput::make('end_year')
                        ->label('End Year')
                        ->required(),
                    ])->columns(2),
                    Group::make()
                    ->schema([
                        DateTimePicker::make('created_at')
                        ->label('Created At')
                        ->timezone('Africa/Cairo')
                        ->default(now())
                        ->hiddenOn('edit')
                        ->required(),
                        DateTimePicker::make('updated_at')
                        ->label('Updated At')
                        ->timezone('Africa/Cairo')
                        ->default(now())
                        ->hiddenOn('create')
                        ->after('created_at')
                        ->required(),
                    ])->columns(2),
                    Textarea::make('description')
                        ->label('Description'),
                ])->columnSpanFull()
            ]);
    }
}
