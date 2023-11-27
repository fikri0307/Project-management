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
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> bbe94287769f5741e2c66cbc687538c945cca4e8
use App\Filament\Resources\ProjectResource\RelationManagers\UsersRelationManager;
use App\Models\Project_statuses;
use App\Models\projects_user;
use App\Models\User;
use App\Models\Users;
use Filament\Tables\Columns\TagsColumn;
use Filament\Tables\Columns\BadgeColumn;
use Illuminate\Support\HtmlString;
<<<<<<< HEAD
=======
=======
use App\Models\Project_statuses;
use App\Models\projects_user;
use App\Models\User;
use Filament\Tables\Columns\TagsColumn;
use Filament\Tables\Filters\SelectFilter;
>>>>>>> e8fbb3af32346b6f11e13b5d66ebfe1c8b1586d2
>>>>>>> bbe94287769f5741e2c66cbc687538c945cca4e8

class ProjectResource extends Resource
{
    protected static ?string $model = project::class;

    protected static ?string $navigationIcon = 'heroicon-o-inbox';

    protected static ?int $navigationSort = 2;
<<<<<<< HEAD

    protected static ?string $modelLabel = 'Project';
=======
<<<<<<< HEAD

    protected static ?string $modelLabel = 'Project';
=======
>>>>>>> e8fbb3af32346b6f11e13b5d66ebfe1c8b1586d2
>>>>>>> bbe94287769f5741e2c66cbc687538c945cca4e8

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
<<<<<<< HEAD
                        TextInput::make('name')->label('Project Name')->required()->autofocus()
                        ,
=======
<<<<<<< HEAD
                        TextInput::make('name')->label('Project Name')->required()->autofocus()
                        ,
=======
                        TextInput::make('name')->label('Project Name')->required()->autofocus(),
>>>>>>> e8fbb3af32346b6f11e13b5d66ebfe1c8b1586d2
>>>>>>> bbe94287769f5741e2c66cbc687538c945cca4e8
                        Select::make('owner_id')
                            ->label('Project Manager')
                            ->options( fn() => User::role(['project-management', 'admin'])->get()->pluck('name', 'id')->toArray())
                            ->required()
                            ->disablePlaceholderSelection()
                        ,
<<<<<<< HEAD
                        Textarea::make('description')
=======
<<<<<<< HEAD
                        Textarea::make('description')
=======
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
>>>>>>> e8fbb3af32346b6f11e13b5d66ebfe1c8b1586d2
>>>>>>> bbe94287769f5741e2c66cbc687538c945cca4e8
                        ,
                        Select::make('project_statuses_id')
                            ->label('Status')
                            ->options( fn() => Project_statuses::all()->pluck('name', 'id')->toArray() )
                            ->default( fn() => Project_statuses::where('is_default', true)->first()?->id )
                            ->required()
                            ->disablePlaceholderSelection()
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
                        ,
>>>>>>> e8fbb3af32346b6f11e13b5d66ebfe1c8b1586d2
>>>>>>> bbe94287769f5741e2c66cbc687538c945cca4e8
                    ])
                    ->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table 
            ->columns([
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> bbe94287769f5741e2c66cbc687538c945cca4e8
                TextColumn::make('name')->sortable()->searchable()->label('Name')
                ,
                TextColumn::make('owner.name')->sortable()->label('PM')
                ,
                TagsColumn::make('users.name')->label('Assign')->limit(3)
                ,
                TextColumn::make('projectStatus.name')->sortable()->label('Status')
                    ->formatStateUsing(fn($record) => new HtmlString('
                    <div class="flex items-center gap-2">
                        <span>' . $record->projectStatus->name . '</span>
                        <span class="filament-tables-color-column relative flex h-6 w-6 rounded-md"
                            style="background-color: ' . $record->projectStatus->color . '">
                        </span>
                    </div>
                '))
<<<<<<< HEAD
=======
=======
                TextColumn::make('name')->sortable()->searchable()->label('Name'),
                // TextColumn::make('description')->sortable()->searchable(),
                TextColumn::make('projectStatus.name')->sortable()->searchable()->label('Status'),
                TextColumn::make('owner.name')->sortable()->searchable()->label('PM'),
                TagsColumn::make('users.name')->label('Assign')->limit(3)
>>>>>>> e8fbb3af32346b6f11e13b5d66ebfe1c8b1586d2
>>>>>>> bbe94287769f5741e2c66cbc687538c945cca4e8
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
            UsersRelationManager::class
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProjects::route('/'),
            // 'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }    

}
