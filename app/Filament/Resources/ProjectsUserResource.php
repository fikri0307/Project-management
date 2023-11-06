<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use App\Models\Projects_user;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\DeleteBulkAction;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProjectsUserResource\Pages;
use App\Filament\Resources\ProjectsUserResource\RelationManagers;
use App\Filament\Resources\ProjectsUserResource\Pages\EditProjectsUser;
use App\Filament\Resources\ProjectsUserResource\Pages\ListProjectsUsers;
use App\Filament\Resources\ProjectsUserResource\Pages\CreateProjectsUser;

class ProjectsUserResource extends Resource
{
    protected static ?string $title = "projectser";

    protected static ?string $model = Projects_user::class;

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
                TextColumn::make('owner.name')->sortable()->searchable()->label('user'),
                TextColumn::make('projects.name')->sortable()->searchable(),
                TextColumn::make('updated_at')->dateTime('Y-m-d')->sortable()->searchable(),
                TextColumn::make('created_at')->dateTime('Y-m-d')->sortable(),
                TextColumn::make('deleted_at')->dateTime('Y-m-d')->sortable()->searchable(),
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
            'index' => Pages\ListProjectsUsers::route('/'),
            'create' => Pages\CreateProjectsUser::route('/create'),
            'edit' => Pages\EditProjectsUser::route('/{record}/edit'),
        ];
    }    
}
