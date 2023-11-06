<?php

namespace App\Filament\Resources\ProjectsStatusesResource\Pages;

use App\Filament\Resources\ProjectsStatusesResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProjectsStatuses extends ListRecords
{
    protected static string $resource = ProjectsStatusesResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
