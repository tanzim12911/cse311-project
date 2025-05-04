<?php

namespace App\Filament\User\Resources;

use Filament\Tables\Columns\TextColumn;
use App\Filament\User\Resources\TeamsResource\Pages;
use App\Filament\User\Resources\TeamsResource\RelationManagers;
use App\Models\Teams;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TeamsResource extends Resource
{
    protected static ?string $model = Teams::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->sortable()->searchable(),
                TextColumn::make('competition.name')->sortable()->label('Competition'),
                TextColumn::make('stadium')->sortable(),
                TextColumn::make('capacity')->sortable(),
                TextColumn::make('team_value')->sortable()->money('Euro')->label('Total Market Value'),
            ])
            ->filters([
                //
            ])
            ->actions([
                //
            ])
            ->bulkActions([
                //
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
            'index' => Pages\ListTeams::route('/'),
        ];
    }
}
