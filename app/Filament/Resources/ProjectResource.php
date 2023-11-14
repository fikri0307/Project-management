<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Project;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use App\Filament\Resources\ProjectResource\Pages;
use App\Models\Project_statuses;
use App\Models\projects_user;
use App\Models\User;
use Filament\Tables\Columns\TagsColumn;
use Filament\Tables\Filters\SelectFilter;

class ProjectResource extends Resource
{
    protected static ?string $model = project::class;

    protected static ?string $navigationIcon = 'heroicon-o-inbox';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                        TextInput::make('name')->label('Project Name')->required()->autofocus(),
                        Select::make('owner_id')
                            ->label('Project Manager')
                            ->options( fn() => User::role(['project-management', 'admin'])->get()->pluck('name', 'id')->toArray())
                            ->required()
                            ->disablePlaceholderSelection()
                        ,
                        Textarea::make('description'),
                        // Select::make('projects_user')
                        //     ->label('Assign')
                        //     ->multiple()
                        //     ->options(fn() => User::whereHas('roles', function($query) {
                        //             $query->where('name', 'teams');
                        //         })
                        //     ->pluck('name', 'id')->toArray())
                        //     ->required()                            
                        // ,
                        Select::make('users_id')
                            ->label('Assign')
                            ->multiple()
                            ->options(fn(Get $get): Collection => projects_user::query() 
                                ->where('')
                            )
                            ->required()                            
                        ,
                        Select::make('project_statuses_id')
                            ->label('Status')
                            ->options( fn() => Project_statuses::all()->pluck('name', 'id')->toArray() )
                            ->default( fn() => Project_statuses::where('is_default', true)->first()?->id )
                            ->required()
                            ->disablePlaceholderSelection()
                        ,
                    ])
                    ->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table 
            ->columns([
                TextColumn::make('name')->sortable()->searchable()->label('Name'),
                // TextColumn::make('description')->sortable()->searchable(),
                TextColumn::make('projectStatus.name')->sortable()->searchable()->label('Status'),
                TextColumn::make('owner.name')->sortable()->searchable()->label('PM'),
                TagsColumn::make('users.name')->label('Assign')->limit(3)
            ])
            ->filters([

            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                // Tables\Actions\Action::make(),
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
            'index' => Pages\ListProjects::route('/create'),
            //'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }    

}
