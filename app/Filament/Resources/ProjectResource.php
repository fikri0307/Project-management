<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Project;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\FormsComponent;
use Illuminate\Support\HtmlString;
use Filament\Forms\Components\Card;
use function Laravel\Prompts\select;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;


use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ProjectResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProjectResource\RelationManagers;
use Illuminate\Database\Eloquent\Factories\Relationship;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-inbox';

//  protected static ?string $navigationLabel = 'apalah';
    // protected static ?string $modelLabel = '';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // protected $fillable = ['id','name','guard_name','created_at','updated_at'];
                // TextColumn::make('name')->sortable()->searchable()->label('nama'),
                // TextColumn::make('guard_name')->sortable()->searchable(),
                // TextColumn::make('created_at')->sortable()->searchable()->label('Status'),
              
       
                    TextInput::make('name')->required()->autofocus(),
                    TextInput::make('owner_id'),
                    TextInput::make('description'),
                    Select::make('project_statuses_id')
                        ->options([
                            '1' => 'in progress',
                            '2' => 'done'
                        ])->required(),

                    // Select::make('Status')
                    //     ->options([
                    //         'Aktif' => 'Aktif',
                    //         'Tidak aktif' => 'Tidak aktif'

                    //     ]),  
  
                ])
                 ->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->sortable()->searchable()->label('nama'),
                TextColumn::make('description')->sortable()->searchable(),
                TextColumn::make('status.name')->sortable()->searchable()->label('Status'),
                TextColumn::make('owner.name')->sortable()->searchable()->label('owner'),
                TextColumn::make('created_at')->dateTime('Y-m-d')->sortable(),
            ])
            ->filters([
                //
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
