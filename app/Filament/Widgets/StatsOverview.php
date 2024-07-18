<?php

namespace App\Filament\Widgets;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget\Card;
class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Card::make('Users', User::query()->count())
            ->description('All Users'),
            Card::make('Users', Project::query()->count())
            ->description('All Projects'),
            Card::make('Tasks', Task::query()->count())
            ->description('All Tasks')
        
    
        ];
    }
}