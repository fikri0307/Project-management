<?php

namespace App\Filament\Resources;

use Filament\Tables;
use Filament\Resources\Form;
use App\Models\Projects_user;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use App\Filament\Resources\ProjectsUserResource\Pages;
use Filament\Tables\Columns\BadgeColumn;

class ProjectsUserResource extends Resource
{
    protected static ?string $model = projects_user::class;


    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?int $navigationSort = 4;

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
                BadgeColumn::make('users.name')->sortable()->searchable()->label('Team')->colors(['warning']),
                TextColumn::make('projects.name')->sortable()->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListProjectsUsers::route('/'),
            // 'create' => Pages\CreateProjectsUser::route('/create'),
            // 'edit' => Pages\EditProjectsUser::route('/{record}/edit'),
        ];
    }    
}
