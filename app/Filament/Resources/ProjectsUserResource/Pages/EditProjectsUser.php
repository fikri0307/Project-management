<?php

namespace App\Filament\Resources\ProjectsUserResource\Pages;

use App\Filament\Resources\ProjectsUserResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProjectsUser extends EditRecord
{
    protected static string $resource = ProjectsUserResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
