<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\Page;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Hash;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Main Information')
                    ->schema([
                        Group::make()
                             ->schema([
                                 TextInput::make('name')
                                     ->required(),
                                 TextInput::make('password')
                                     ->password()
                                     ->revealable()
                                     ->maxLength(255)
                                     ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                                     ->dehydrated(fn ($state) => filled($state))
                                    ->required(fn (Page $livewire) => ($livewire instanceof CreateRecord))
                                     ->hiddenOn(['edit', 'view']),

                             ])->columns(2),
                        Group::make()
                        ->schema([
                            TextInput::make('email')
                                ->email()
                                ->required()
                                ->unique(ignoreRecord: true),
                            DateTimePicker::make('email_verified_at')
                                ->label('Email verified at')
                                ->timezone('Africa/Cairo')
                                ->default(now())
                        ])->columns(2),
                        Group::make()
                            ->schema([
                                DateTimePicker::make('created_at')
                                    ->label('Created at')
                                    ->timezone('Africa/Cairo')
                                    ->default(now())
                                    ->required()
                                    ->hiddenOn('edit'),
                                DateTimePicker::make('updated_at')
                                    ->label('Updated at')
                                    ->default(now())
                                    ->timezone('Africa/Cairo')
                                    ->afterOrEqual('created_at')
                                    ->hiddenOn('create')
                            ])->columns(2)
                    ])->columnSpanFull(),

                Section::make('Additional Information')
                    ->schema([
                        Textarea::make('bio'),
                        FileUpload::make('image')
                            ->label('Image')
                            ->disk('public')
                           ->directory('images')

                    ])->columnSpanFull(),

                Section::make('Social Information')
                    ->schema([
                        TextInput::make('github_url')
                            ->label('Github Url')
                            ->url(),
                        TextInput::make('twitter_url')
                            ->label('Twitter Url')
                            ->url(),
                        TextInput::make('linkedin_url')
                            ->label('Linkedin Url')
                            ->url()
                    ])->columnSpanFull()
            ]);
    }
}
