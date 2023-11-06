<?php

namespace App\Filament\Resources\UsersHasTicketsResource\Pages;

use App\Filament\Resources\UsersHasTicketsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUsersHasTickets extends EditRecord
{
    protected static string $resource = UsersHasTicketsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
