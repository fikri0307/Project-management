<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UsersHasTicketsResource\Pages;
use App\Filament\Resources\UsersHasTicketsResource\RelationManagers;
use App\Models\users_has_tickets;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UsersHasTicketsResource extends Resource
{
    protected static ?string $model = users_has_tickets::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationGroup = 'ACCOUNT';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListUsersHasTickets::route('/'),
            'create' => Pages\CreateUsersHasTickets::route('/create'),
            'edit' => Pages\EditUsersHasTickets::route('/{record}/edit'),
        ];
    }    
}
