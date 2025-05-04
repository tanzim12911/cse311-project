<?php

namespace App\Filament\Widgets;

use App\Models\Players;
use App\Models\Teams;
use App\Models\Competitions;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget\Card;

class DashboardStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Card::make('Total Players', Players::count())
                ->description('Number of Players Added')
                ->icon('heroicon-o-users')
                ->color('success'),

            Card::make('Total Teams', Teams::count())
                ->description('Number of Teams Added')
                ->icon('heroicon-o-user-group')
                ->color('primary'),

            Card::make('Total Competitions', Competitions::count())
                ->description('Number of Competitions Added')
                ->icon('heroicon-o-trophy')
                ->color('success'),
        ];
    }
}
