<?php

namespace App\Filament\Resources\UsersHasTicketsResource\Pages;

use App\Filament\Resources\UsersHasTicketsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUsersHasTickets extends ListRecords
{
    protected static string $resource = UsersHasTicketsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
