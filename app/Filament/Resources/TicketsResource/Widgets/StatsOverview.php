<?php

namespace App\Filament\Resources\TicketsResource\Widgets;

use App\Filament\Resources\TicketsResource;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\Summarizers\Count;
use Illuminate\Database\Query\Builder;
use App\Models\tickets;
use App\Models\users;
use App\Models\project;
use App\Models\Project_statuses;
use App\Models\projects_user;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Forms\Components\Grid;
use App\Models\ticket_statuses;
use Filament\Tables\Columns\BadgeColumn;
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
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('warning')
                ->descriptionIcon('heroicon-o-folder-open'),
        ];
    }
    
}
