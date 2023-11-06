<?php

namespace App\Filament\Pages;

use App\Models\profile as ModelsProfile;
use Filament\Pages\Page;
use Filament\Tables\Table;
use Filament\Resources\Form;
use Filament\Forms\Components\Card;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\DeleteBulkAction;
 use RyanChandler\FilamentProfile\Pages\Profile as BaseProfile;

 class Profile extends BaseProfile  
//class Profile extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'ACCOUNT';

    //   protected static string $view = 'filament.pages.profile';
    protected static ?string $modelLabel = 'apalah';
     protected static ?string $model = Profile::class;  

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->sortable()->searchable()->label('nama'),
                TextColumn::make('email')->sortable()->searchable(),
                TextColumn::make('project_statuses_id')->sortable()->searchable()->label('Status'),
                TextColumn::make('owner_id')->sortable()->searchable()->label('owner'),
            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                // Tables\Actions\DeleteAction::make(),
                // Tables\Actions\Action::make(),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
            ]);
    }
    
    
}

    // public static function form(Form $form): Form
    // {
    //     return $form
    //         ->schema([
               
              
    //             Card::make()
    //             ->schema([
    //                 TextInput::make('name')->required(),
    //                 TextInput::make('owner')->required(),
    //                 TextInput::make('description'),
    //                 TextInput::make('project_statuses_id'), 
    //                 // Select::make('Status')
    //                 //     ->options([
    //                 //         'Aktif' => 'Aktif',
    //                 //         'Tidak aktif' => 'Tidak aktif'

    //                 //     ]),  
    //              ])
    //             ])
    //             // ->columns(),
    //             //
    //         ;
    // }