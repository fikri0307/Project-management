<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\roles;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use App\Filament\Resources\RolesResource\Pages;
use App\Models\permissions;

class RolesResource extends Resource
{
    protected static ?string $model = roles::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'ACCOUNT';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make()
                    ->columns(1)
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label(__('Role name'))
                            ->unique(table: permissions::class, column: 'name')
                            ->maxLength(255)
                            ->required(),

                        Forms\Components\CheckboxList::make('permissions')
                            ->label(__('Permissions'))
                            ->required()
                            ->columns(4)
                            ->relationship('permissions', 'name'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('Permission name'))
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TagsColumn::make('permissions.name')
                    ->label(__('Permissions'))
                    ->limit(1),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListRoles::route('/create'),
            //  'create' => Pages\CreateRoles::route('/create'),
            // 'edit' => Pages\EditRoles::route('/{record}/edit'),
        ];
    }
}
