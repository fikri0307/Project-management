<?php

namespace App\Filament\Resources\TicketsResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

use App\Models\tickets;
class StatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        $inProgressCount = tickets::where('ticket_statuses_id', 11)->count(); // Assuming 11 is 'In Progress'
        $doneCount = tickets::where('ticket_statuses_id', 12)->count(); // Assuming 12 is 'Done'

        return [
            Card::make('In Progress', $inProgressCount)
                ->chart([1, 4, 1, 27])
                ->description('In Progress')
                ->color('secondary')
                ->descriptionIcon('heroicon-o-clock'),

            Card::make('Done', $doneCount)
                ->chart([1, 4, 1, 27])
                ->description('Done')
                ->color('success')
                ->descriptionIcon('heroicon-o-check-circle'),

            Card::make('Todos', tickets::query()->count())
                ->chart([ 2, 2, 2, 2 ])
                ->color('warning')
                ->descriptionIcon('heroicon-o-folder-open'),
        ];
    }
    
}
