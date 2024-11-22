<?php
namespace App\Filament\Pages\Tenancy;

use App\Models\Company;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Tenancy\RegisterTenant;
use Illuminate\Database\Eloquent\Model;

class RegisterCompany extends RegisterTenant
{
    public static function getLabel(): string
    {
        return 'Register Company';
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('ruc')
                    ->label('RUC')
                    ->required()
                    ->unique('companies', 'ruc'),
                TextInput::make('name')
                    ->label('Name')
                    ->required(),
                TextInput::make('email')
                    ->label('Email')
                    ->required()
                    ->email()
                    ->unique('companies', 'email'),
                TextInput::make('phone')
                    ->label('Phone')
                    ->required(),
            ]);
    }

    protected function handleRegistration(array $data): Company
    {
        $company = Company::create($data);
        $company->users()->attach(auth()->user());
        return $company;
    }
}