<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PasswordVaultResource\Pages;
use App\Filament\Resources\PasswordVaultResource\RelationManagers;
use App\Models\PasswordVault;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\SpatieTagsInput;

class PasswordVaultResource extends Resource
{
    protected static ?string $model = PasswordVault::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([ 
                Section::make('Credenciales de acceso') 
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('username')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('password')
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('url')
                            ->maxLength(255),
                    ]),
                Section::make('Otras opciones') 
                    ->schema([
                        Forms\Components\Select::make('visibility')
                            ->options([
                                'public' => 'publico',
                                'private' => 'privado',
                            ])
                            ->default('public')
                            ->native(false),
                        Forms\Components\Textarea::make('notes')
                            ->columnSpanFull(),
                        SpatieTagsInput::make('tags')
                            ->type('categories'),
                        Forms\Components\Toggle::make('active')
                            ->required()
                            ->hiddenOn('create'),
                    ]),
            ]);
    }
    

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('username')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('password')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('url')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('visibility')
                    ->searchable(),
                Tables\Columns\IconColumn::make('active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPasswordVaults::route('/'),
            'create' => Pages\CreatePasswordVault::route('/create'),
            'view' => Pages\ViewPasswordVault::route('/{record}'),
            'edit' => Pages\EditPasswordVault::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
