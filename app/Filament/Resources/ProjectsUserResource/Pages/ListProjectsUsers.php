<?php

namespace App\Filament\Resources\ProjectsUserResource\Pages;

use App\Filament\Resources\ProjectsUserResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProjectsUsers extends ListRecords
{
    protected static string $resource = ProjectsUserResource::class;

    protected function getActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
