<?php

namespace App\Filament\Resources\ProjectsStatusesResource\Pages;

use App\Filament\Resources\ProjectsStatusesResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProjectsStatuses extends EditRecord
{
    protected static string $resource = ProjectsStatusesResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
