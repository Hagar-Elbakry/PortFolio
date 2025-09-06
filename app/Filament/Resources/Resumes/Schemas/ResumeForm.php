<?php

namespace App\Filament\Resources\Resumes\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ResumeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                ->schema([
                    FileUpload::make('resume')
                    ->disk('public')
                    ->directory('resume')
                     ->acceptedFileTypes([
                         'application/pdf',
                         'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
                     ])
                    ->required(),
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
                        ])->columns(2)
                ])->columnSpanFull()
            ]);
    }
}
