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
use App\Filament\Resources\ProjectResource\RelationManagers\UsersRelationManager;
use App\Models\Project_statuses;
use App\Models\projects_user;
use App\Models\User;
use App\Models\Users;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\TagsColumn;
use Filament\Tables\Columns\BadgeColumn;
use Illuminate\Support\HtmlString;

class ProjectResource extends Resource
{
    protected static ?string $model = project::class;

    protected static ?string $navigationIcon = 'heroicon-o-inbox';
    
    protected static ?int $navigationSort = 2;

    protected static ?string $modelLabel = 'Project';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                        TextInput::make('name')->label('Project Name')->required()->autofocus()
                        ,
                        Select::make('owner_id')
                            ->label('Project Manager')
                            ->options( fn() => User::all()->pluck('name', 'id')->toArray())
                            ->required()
                            ->disablePlaceholderSelection()
                        ,
                        Textarea::make('description')                           
                        ,
                        Select::make('project_statuses_id')
                            ->label('Status')
                            ->options( fn() => Project_statuses::all()->pluck('name', 'id')->toArray() )
                            ->default( fn() => Project_statuses::where('is_default', true)->first()?->id )
                            ->required()
                            ->disablePlaceholderSelection()
                    ])
                    ->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table 
            ->columns([
                Stack::make([
                    Split::make([
                    Stack::make([
                TextColumn::make('name')->sortable()->searchable()->label('Name')->size('lg')->weight('bold')
                ,
                TextColumn::make('description')->label('')->size('sm')->weight('bold')->color('secondary')
                ,
                TextColumn::make('')
                ,
                Stack::make([
                    Split::make([

                BadgeColumn::make('projectStatus.name')->sortable()->label('Status')->searchable()
                ->colors([
                    'success' => 'Done',
                    'secondary' => 'In Progress',
                        ])
                ->formatStateUsing(fn($record) => new HtmlString
                ('
                    <div class="flex items-center gap-2">
                        <span>' . $record->projectStatus->name . '</span>    
                    </div>
                ')),
                
                        
                ])
                ])
                ]),
                Stack::make([
                TextColumn::make('')->placeholder('Project Manager')->size('lg')->weight('bold')
                ,
                TextColumn::make('owner.name')->sortable()->searchable()->label('Project Manager')->weight('bold')->color('success')
                ,
                TextColumn::make('')
                ,
                TextColumn::make('')
                ,
                ]),
                Stack::make([
                TextColumn::make('')->placeholder('Assign')->size('lg')->weight('bold')
                ,
                TagsColumn::make('users.name')->label('Assign')->limit(3)
                ,
                TextColumn::make('')
                ,
                TextColumn::make('')
                ,
                ]),            
                ])
            ]),
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
