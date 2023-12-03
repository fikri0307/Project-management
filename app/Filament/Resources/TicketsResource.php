<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Tickets;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Card;

use App\Filament\Resources\TicketsResource\Pages;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\BadgeColumn;
use App\Models\project;
use App\Models\projects_user;
use App\Models\ticket_statuses;
use App\Models\User;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Forms\Components\DatePicker;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Grid;
use Filament\Tables\Columns\IconColumn;
class TicketsResource extends Resource
{
    protected static ?string $model = tickets::class;

    protected static ?string $modelLabel = 'Todo';

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationLabel = 'Todo';

    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make()
                ->schema([
                        Select::make('projects_id')
                            ->label('Projects')
                            ->options(fn() => projects_user::where('users_id', Auth::id())->with('projects')->get()
                                ->pluck('projects.name', 'projects.id'))
                            // ->default(fn() => projects_user::where('users_id', Auth::id())->with('projects')->get()
                            //     ->pluck('projects.name', 'projects.id'))
                            // ->disablePlaceholderSelection()
                            ->required()
                        ,
                        Select::make('owner_id')
                            ->label('PM')
                            ->options(fn() => project::whereNotNull('owner_id')->with('owner')->get()
                                ->flatMap(function ($project) {
                                    return [$project->owner->id => $project->owner->name];
                                }))
                            ->default(fn() => project::whereNotNull('owner_id')->first()
                                ? project::whereNotNull('owner_id')->first()->owner->id : null)
                            // ->default(fn() => project::whereNotNull('owner_id')->with('owner')->get()
                            //     ->pluck('owner.name', 'owner.id'))
                            ->disablePlaceholderSelection()
                            ->required()
                        ,
                        Textarea::make('name')->label('Todo')->rows(2)->required()
                        ,
                        Textarea::make('content')->label('Description')->rows(5)
                        ,
                        Select::make('team_id')
                            ->label('Assign')
                            // ->options(fn() => User::where('id', Auth::id())->pluck('name', 'id')->toArray())
                            ->options(fn() => projects_user::where('users_id', Auth::id())->with('users')->get()
                                ->pluck('users.name', 'users.id'))
                            ->default(fn() => projects_user::where('users_id', Auth::id())->with('users')->first()
                            ? projects_user::where('users_id', Auth::id())->with('users')->first()->users->id
                            : null)
                            ->disablePlaceholderSelection()
                            ->required()
                        ,
                        Select::make('ticket_statuses_id')
                            ->label('Status')
                            ->options(fn() => ticket_statuses::all()->pluck('name', 'id')->toArray())
                            ->default(fn() => ticket_statuses::where('is_default', true)->first()?->id)
                            ->disablePlaceholderSelection()
                            ->required()
                        ,
                ])->columns(1),
                Grid::make()
                ->schema([
                        DatePicker::make('due_at')->label('Due At')
                        ,
                        DatePicker::make('complete_at')->label('Done At')

                ])->columns(2)
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                
            Split::make ([
                //Grid::make()
               // ->schema([
                Stack::make([
                TextColumn::make('')->sortable()->placeholder('Project')->size('sm')->color('secondary')
                ,  
                TextColumn::make('projects.name')->sortable()->searchable()->label('Project')
                ,
                Split::make([
                TextColumn::make('')->sortable()->placeholder('Manager:')->size('sm')->color('secondary')
                        ,
                        TextColumn::make('owner.name')->sortable()->searchable()->label('PM')->color('success')
                        ,  
                        TextColumn::make('')->sortable()
                ,
                TextColumn::make('')->sortable()
                ,
                TextColumn::make('')->sortable()
                ,
                TextColumn::make('')->sortable()
                
                ]),

                TextColumn::make('')->sortable()
                ,
                
               

            Split::make([
                //Grid::make()
                //->schema([
                BadgeColumn::make('status.name')
                ->label(__('Status'))
                ->colors([ 
                    'success' => 'Done',
                    'secondary' => 'In Progress',
                        ])
                ->formatStateUsing(fn($record) => new HtmlString
                ('
                    <div class="flex items-center gap-1">
                        <span color: green;>' . $record->status->name . '</span>             
                    </div>
                ')),
                
               // ])->columns(1) //schema
                ])
                ]),
                
               
                Stack::make ([
                    
                    Split::make([
                        TextColumn::make('')->sortable()->placeholder('Assignee:')->size('sm')->color('secondary')
                        ,                 
                        TextColumn::make('team.name')->sortable()->searchable()->label('Team')->color('primary')
                        , 
                        TextColumn::make('')->sortable()
                        ,
                        TextColumn::make('')->sortable()
                        ,                 
                        TextColumn::make('')->sortable()
                        ,
                        
                        ]),
                    TextColumn::make('name')->sortable()->searchable()->label('Todo')
                    ,
                    TextColumn::make('')->sortable()
                    ,
                    TextColumn::make('')->sortable()
                    ,
                    TextColumn::make('')->sortable()
                    ,
                    
                    
                    
                    
                    
                    
                ]),
              
                Split::make([TextColumn::make('')->sortable()
                ,
                Stack::make ([
                TextColumn::make('')->sortable()->placeholder('Due At')->size('sm')->color('')
                ,    
                TextColumn::make('due_at')->date()->size('sm')->Icon('heroicon-o-clock')->color('primary')
                ,
                TextColumn::make('')->sortable()->placeholder('Done At')->size('sm')->color('')
                ,
                TextColumn::make('complete_at')->date()->size('sm')->Icon('heroicon-o-clock')->color('success')
                ,
                TextColumn::make('')->sortable()
                ,
                ])
                ])
               
             
          
               // ->colors(['success']),
           
               
               // ])->columns(1) //schema
                ])

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
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
            'index' => Pages\ListTickets::route('/'),
            // 'create' => Pages\CreateTickets::route('/create'),
            // 'edit' => Pages\EditTickets::route('/{record}/edit'),
        ];
    }  
    public static function getWidgets(): array
    {
        return [
            TicketsResource\Widgets\StatsOverview::class,
            TicketsResource\Widgets\BlogPostsChart::class,
        ];
    }  
}
