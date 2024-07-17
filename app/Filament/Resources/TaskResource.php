<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TaskResource\Pages;
use App\Filament\Resources\TaskResource\RelationManagers;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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
    ->options (Project::pluck('name','id'))
    /*
    ->relationship(
        name:'projects',
            titleAttribute:'name',
         modifyQueryUsing: fn (Builder $query,Get $get) =>$query->withTrashed()
         
          // modifyQueryUsing: fn (Builder $query) => $query->whereDoesntHave('tasks') 
      )
          */
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
        $list=[];
        // Get the currently authenticated user's ID...
        foreach ($porjects_user as $pr) {
   // echo ($pr->id);
    array_push($list,$pr->id);
    echo('<br>');
}

        return parent::getEloquentQuery()->whereIn('project_id', $list);
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                ->searchable(),
                Tables\Columns\TextColumn::make('project_id')
                ->searchable(),
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
   
    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['user_id'] = auth()->id();
     
        return $data;
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