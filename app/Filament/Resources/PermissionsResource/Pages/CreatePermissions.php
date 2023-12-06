<?php

namespace App\Filament\Resources\PermissionsResource\Pages;

use App\Filament\Resources\PermissionsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePermissions extends CreateRecord
{
    protected static string $resource = PermissionsResource::class;

    protected function getRedirectUrl(): string
{
    return $this->getResource()::getUrl('');
}
}
