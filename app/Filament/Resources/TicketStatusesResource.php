<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use App\Models\Ticket_statuses;
use Filament\Resources\Resource;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ColorColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\TicketStatusesResource\Pages;
use App\Filament\Resources\TicketStatusesResource\RelationManagers;
use Filament\Tables\Actions\DeleteBulkAction;

class TicketStatusesResource extends Resource
{
    protected static ?string $model = Ticket_statuses::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

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
                TextColumn::make('id')->sortable()->searchable(),
                TextColumn::make('name')->sortable()->searchable()->label('user'),
                ColorColumn::make('color')->sortable()->searchable(),
                TextColumn::make('is_default')->sortable()->searchable()
                ->enum([
                    '1' => 'true',
                    '2'=> '1',
                ]), 
                TextColumn::make('updated_at')->dateTime('Y-m-d')->sortable()->searchable(),
                TextColumn::make('created_at')->dateTime('Y-m-d')->sortable(),
                TextColumn::make('is_default')->sortable()->searchable(),    
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
            'index' => Pages\ListTicketStatuses::route('/'),
            'create' => Pages\CreateTicketStatuses::route('/create'),
            'edit' => Pages\EditTicketStatuses::route('/{record}/edit'),
        ];
    }    
}
