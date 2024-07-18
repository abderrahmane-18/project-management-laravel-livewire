<?php

namespace App\Filament\App\Widgets;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $user = Auth::user();
        $id = Auth::id();
        $user_project=User::find($id);
        $porjects_user=$user_project->projects;
        $list_project_logged_user=[];
      
        foreach ($porjects_user as $pr) {
            // echo ();
             array_push($list_project_logged_user,$pr->id);
             Log::info($pr->id);
            
         }
         $task=Task::get()->where('status','pending')->count();
         Log::info( $task);
        return [
            Card::make('Projects', Project::query()->where('user_id',auth()->id())->count())
            ->description('all projects associated with the logged-in userAll Projects')
        
            ->color('success'),
         
        Card::make('Tasks', Task::get()->whereIn('project_id',$list_project_logged_user)->count())
            ->description('all tasks associated with the logged-in user projects')
    
            ->color('success'),
            Card::make('Tasks Pending', Task::get()->whereIn('project_id',$list_project_logged_user)
            ->where('status','pending')
            ->count())
            ->description('all tasks pending with the logged-in user projects' )
    
            ->color('danger'),
        ];
    }
}