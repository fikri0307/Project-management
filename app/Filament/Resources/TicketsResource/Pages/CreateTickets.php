<?php

namespace App\Filament\Resources\TicketsResource\Pages;

use App\Filament\Resources\TicketsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTickets extends CreateRecord
{
    protected static string $resource = TicketsResource::class;

    protected function getHeaderWidgets(): array
    {
        return [
           // TicketsResource\Widgets\StatsOverview::class,
           // TicketsResource\Widgets\BlogPostsChart::class,
            
        ];
    }
}
