<?php

namespace App\Filament\Resources\PasswordVaultResource\Pages;

use App\Filament\Resources\PasswordVaultResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPasswordVault extends EditRecord
{
    protected static string $resource = PasswordVaultResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
