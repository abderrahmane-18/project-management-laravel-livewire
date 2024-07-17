<?php

namespace App\Filament\App\Resources;

use App\Filament\App\Resources\TaskResource\Pages;
use App\Filament\App\Resources\TaskResource\RelationManagers;
use App\Models\Task;
use Filament\Forms;
use Filament\Forms\Components\Select;
use App\Models\Project;

use App\Models\User;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class TaskResource extends Resource
{
    protected static ?string $model = Task::class;

    protected static ?string $navigationIcon = 'heroicon-o-pencil';
    
    protected static ?string $navigationGroup='User Panel';
   
    public static function form(Form $form): Form
    {
        

        $use1=Project::find(8);
        $user = Auth::user();
      
 
// Get the currently authenticated user's ID...
$id = Auth::id();
     
   //   echo($id );
      $use2=User::find($id);
    //  echo("\n");
     // echo($use2->projects);
   //  Log::info('Showing the user profile for user: ');

        return $form
            ->schema([
               
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->columnSpanFull(),
                   
                   Select::make('status')
    ->options([
        'pending' => 'PENDING',
        'in-progress' => 'PROGRESS',
        'completed' => 'COMPLETED',
    ])  ->default('pending')
    ->required()
    ,
    Forms\Components\Select::make('project_id')

    #->options(Project::pluck('name','id')->where(User::get('id'),auth()->id()))
   // ->options (Project::pluck('name','id'))
   
    ->relationship(
        'projects',
         'name',

         
          // modifyQueryUsing: fn (Builder $query) => $query->whereDoesntHave('tasks') 
      )
          
   # ->options(\App\Models\Project\Project::all()->pluck('name','id'))
    ->required(),      
    ]);
    
    }
    public static function getEloquentQuery(): Builder
    {
        $user = Auth::user();
        $id = Auth::id();

        $user_project=User::find($id);
       
      //  echo( $user_project->projects);
        $porjects_user=$user_project->projects;
        $list_project_logged_user=[];
        // Get the currently authenticated user's ID...
        foreach ($porjects_user as $pr) {
   // echo ($pr->id);
    array_push($list_project_logged_user,$pr->id);
    echo('<br>');
}

        return parent::getEloquentQuery()->whereIn('project_id', $list_project_logged_user);
    }
    public static function table(Table $table): Table
    {
        
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                ->searchable(),
                Tables\Columns\TextColumn::make('projects.description')->label('project-name')
 ->searchable()

 ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTasks::route('/'),
            'create' => Pages\CreateTask::route('/create'),
            'view' => Pages\ViewTask::route('/{record}'),
            'edit' => Pages\EditTask::route('/{record}/edit'),
        ];
    }
}