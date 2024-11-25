<?php

namespace App\Filament\Resources\PasswordVaultResource\Pages;

use App\Filament\Resources\PasswordVaultResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPasswordVaults extends ListRecords
{
    protected static string $resource = PasswordVaultResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
