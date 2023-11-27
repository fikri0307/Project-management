<?php

namespace App\Filament\Resources;

use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use App\Models\Ticket_statuses;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ColorColumn;
use App\Filament\Resources\TicketStatusesResource\Pages;
<<<<<<< HEAD
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\ColorPicker;
use Filament\Tables\Columns\IconColumn;
=======

>>>>>>> e8fbb3af32346b6f11e13b5d66ebfe1c8b1586d2

class TicketStatusesResource extends Resource
{
    protected static ?string $model = ticket_statuses::class;

    protected static ?string $modelLabel = 'Todo Status';

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationLabel = 'Todo Status';

    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->label('Name Status')
                ,
                ColorPicker::make('color')->label('Color')
                ,
                Checkbox::make('is_default')->label('Is Default')

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->sortable()->searchable()->label('user'),
                ColorColumn::make('color')->sortable()->searchable(),
                IconColumn::make('is_default')->sortable()->boolean()->searchable()->label('Is Default'),     
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
            'index' => Pages\ListTicketStatuses::route('/'),
            // 'create' => Pages\CreateTicketStatuses::route('/create'),
            // 'edit' => Pages\EditTicketStatuses::route('/{record}/edit'),
        ];
    }    
}
