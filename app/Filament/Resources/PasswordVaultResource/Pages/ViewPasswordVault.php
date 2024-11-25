<?php

namespace App\Filament\Resources\PasswordVaultResource\Pages;

use App\Filament\Resources\PasswordVaultResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPasswordVault extends ViewRecord
{
    protected static string $resource = PasswordVaultResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
