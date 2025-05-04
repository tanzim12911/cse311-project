<?php

namespace App\Filament\User\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Matches;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\User\Resources\MatchesResource\Pages;
use App\Filament\User\Resources\MatchesResource\RelationManagers;

class MatchesResource extends Resource
{
    protected static ?string $model = Matches::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-date-range';

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('competition.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('homeTeam.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('awayTeam.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('date')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('venue')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
                Tables\Actions\Action::make('watchlist')
                ->label('Subscribe')
                ->action(function (Matches $record) {
                   $record->watchers()->sync(Auth::user()->id);
                   $record->save();

                   \Filament\Notifications\Notification::make()
                   ->title('Subscribed')
                   ->success()
                   ->send();
                })
                ->icon('heroicon-o-bell')
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageMatches::route('/'),
        ];
    }
}
