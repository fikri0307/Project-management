<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Faker\Core\Color;
use Filament\Resources\Form;
use Filament\Resources\Table;
use App\Models\Project_statuses;
use Filament\Resources\Resource;
use Illuminate\Support\HtmlString;
use Filament\Forms\Components\Select;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ColorColumn;
use Filament\Tables\Actions\DeleteAction;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\DeleteBulkAction;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProjectsStatusesResource\Pages;
use App\Filament\Resources\ProjectsStatusesResource\RelationManagers;
use App\Filament\Resources\ProjectsStatusesResource\Pages\EditProjectsStatuses;
use App\Filament\Resources\ProjectsStatusesResource\Pages\ListProjectsStatuses;
use App\Filament\Resources\ProjectsStatusesResource\Pages\CreateProjectsStatuses;

class ProjectsStatusesResource extends Resource
{
    protected static ?string $model = Project_statuses::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
               
                TextInput::make('name')->required()->autofocus(),
                TextInput::make('owner_id'),
                TextInput::make('description'),
                Select::make('project_statuses_id')
                    ->options([
                        '1' => 'in progress',
                        '2' => 'done'
                    ])->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                    TextColumn::make('name')->sortable()->searchable()->label('nama'),
                    ColorColumn::make('color')->sortable()->searchable(),
                   
            
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
            'index' => Pages\ListProjectsStatuses::route('/'),
            'create' => Pages\CreateProjectsStatuses::route('/create'),
            'edit' => Pages\EditProjectsStatuses::route('/{record}/edit'),
        ];
    }    
}
