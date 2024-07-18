<?php

namespace App\Filament\App\Resources;

use App\Filament\App\Resources\ProjectResource\Pages;
use App\Filament\App\Resources\ProjectResource\RelationManagers;
use App\Http\Controllers\globalController;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\User;
use Filament\Forms\Components\MarkdownEditor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';
    protected static ?string $navigationGroup='User Panel';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
             Forms\Components\Card::make()
             ->schema([
                Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(255),
                Forms\Components\Textarea::make('description')
                ->columnSpanFull(),
                   , 
                  
                //    Forms\Components\Select::make('user_id')
                //    ->relationship('users','email')
                //    ->required()
                   
             ])
              
                
            ]);
    }

    public static function table(Table $table): Table
    {
       
      
       $project= User::where("id",auth()->id())->get('name');
       

       Log::info( $project);
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                ->numeric()
                ->sortable(),
                Tables\Columns\TextColumn::make(  'user_id')->label('id-user')

                    
              
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
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
                Tables\Actions\DeleteAction::make(),
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
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('user_id', auth()->id());
    }


    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'view' => Pages\ViewProject::route('/{record}'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}