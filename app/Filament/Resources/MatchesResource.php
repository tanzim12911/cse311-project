<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MatchesResource\Pages;
use App\Filament\Resources\MatchesResource\RelationManagers;
use App\Models\Matches;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MatchesResource extends Resource
{
    protected static ?string $model = Matches::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-date-range';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('competition_id')
                    ->relationship('competition', 'name')
                    ->required(),

                Forms\Components\Select::make('team_id_home')
                    ->label('Home Team')
                    ->relationship('homeTeam', 'name')
                    ->required(),

                Forms\Components\Select::make('team_id_away')
                    ->label('Away Team')
                    ->relationship('awayTeam', 'name')
                    ->required(),

                Forms\Components\DateTimePicker::make('date')
                    ->required(),

                Forms\Components\TextInput::make('venue')
                    ->required()
                    ->maxLength(255),

                Forms\Components\Select::make('status')
                    ->options([
                        'upcoming' => 'Upcoming',
                        'finished' => 'Finished',
                        'in-progress' => 'In Progress',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('competition.name')->label('Competition'),
                Tables\Columns\TextColumn::make('homeTeam.name')->label('Home Team'),
                Tables\Columns\TextColumn::make('awayTeam.name')->label('Away Team'),
                Tables\Columns\TextColumn::make('date')->dateTime(),
                Tables\Columns\TextColumn::make('venue'),
                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'primary' => 'upcoming',
                        'success' => 'finished',
                        'warning' => 'in-progress',
                    ]),
            ])
            ->filters([
                //
            ])
            ->actions([
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMatches::route('/'),
            'create' => Pages\CreateMatches::route('/create'),
            'edit' => Pages\EditMatches::route('/{record}/edit'),
        ];
    }
}
