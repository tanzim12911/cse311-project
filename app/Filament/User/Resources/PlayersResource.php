<?php

namespace App\Filament\User\Resources;

use Filament\Tables\Columns\TextColumn;
use App\Filament\User\Resources\PlayersResource\Pages;
use App\Filament\User\Resources\PlayersResource\RelationManagers;
use App\Models\Players;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PlayersResource extends Resource
{
    protected static ?string $model = Players::class;

    protected static ?string $navigationIcon = 'heroicon-o-identification';

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
                TextColumn::make('team.name')->sortable()->label('Team'),
                TextColumn::make('position')->sortable(),
                TextColumn::make('dob')->sortable()->label('Date of Birth'),
                TextColumn::make('country')->sortable(),
                TextColumn::make('market_value')->sortable()->money('Euro')->label('Market Value'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make('viewStats')
                ->label('Stats')
                ->icon('heroicon-o-chart-bar')
                ->color('warning')
                ->modalHeading(fn (Players $record) => "Stats for {$record->name}")
                ->modalContent(function (Players $record) {
                    return view('filament.user.players.stats-modal', ['player' => $record]);
                }),

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
            'index' => Pages\ListPlayers::route('/'),
        ];
    }
}
