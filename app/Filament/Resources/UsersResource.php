<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Users;
use App\Models\User;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Illuminate\Support\Carbon;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\CheckboxList;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\UsersResource\Pages;

class UsersResource extends Resource
{
    // protected static ?string $model = Users::class;
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?int $navigationSort = 3;

    protected static ?string $navigationGroup = 'SETTINGS';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        TextInput::make('name')
                            ->label('Name')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('email')
                            ->label('Email address')
                            ->email()
                            ->required()
                            ->rule(
                                fn ($record) => 'unique:users,email,'
                                    . ($record ? $record->id : 'NULL')
                                    . ',id,deleted_at,NULL'
                            )
                            ->maxLength(255),

                        TextInput::make('password')
                        ->label('Password')
                        ->required()

                        ,

                        CheckboxList::make('roles')
                            ->label('Permission roles')
                            ->required()
                            ->columns(3)
                            ->relationship('roles', 'name'),
                    ])
                    ->columns(2),
                // 
            ]);
    }

    public static function table(Table $table): Table
    {


        return
            // $date = Carbon::now();
            $table

            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('Name'))
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('email')
                    ->label(__('Email address'))
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TagsColumn::make('roles.name')
                    ->label(__('Roles'))
                    ->limit(2),

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
            'index' => Pages\ListUsers::route('/create'),
            // 'create' => Pages\CreateUsers::route('/create'),
            // 'edit' => Pages\EditUsers::route('/{record}/edit'),
        ];
    }
}
