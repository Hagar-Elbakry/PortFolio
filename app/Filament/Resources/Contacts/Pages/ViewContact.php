<?php

namespace App\Filament\Resources\Contacts\Pages;

use App\Filament\Resources\Contacts\ContactResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Pages\ViewRecord;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class ViewContact extends ViewRecord
{
    protected static string $resource = ContactResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    public function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                ->schema([
                    TextEntry::make('name'),
                    TextEntry::make('email')->icon(Heroicon::Envelope)->iconColor('primary'),
                    TextEntry::make('phone')->icon(Heroicon::Phone)->iconColor('primary'),
                    TextEntry::make('message'),
                    TextEntry::make('created_at')
                        ->since(),
                ])->columnSpanFull()
            ]);
    }
}
