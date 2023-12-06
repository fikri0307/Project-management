<?php

namespace App\Filament\Resources;

use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use App\Models\Project_statuses;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Checkbox;
use Filament\Tables\Columns\ColorColumn;
use Filament\Forms\Components\ColorPicker;
use Filament\Tables\Columns\IconColumn;
use App\Filament\Resources\ProjectsStatusesResource\Pages;


class ProjectsStatusesResource extends Resource
{
    protected static ?string $model = Project_statuses::class;

    protected static ?string $modelLabel = 'Project Status';

    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';

    protected static ?string $navigationLabel = 'Project Status';

    protected static ?int $navigationSort = 3;

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
                    TextColumn::make('name')->searchable()->label('Status'),
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
            'index' => Pages\ListProjectsStatuses::route('/'),
            // 'create' => Pages\CreateProjectsStatuses::route('/create'),
            // 'edit' => Pages\EditProjectsStatuses::route('/{record}/edit'),
        ];
    }    
}
