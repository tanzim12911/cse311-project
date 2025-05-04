<?php

namespace App\Filament\Resources;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use App\Filament\Resources\PlayersResource\Pages;
use App\Filament\Resources\PlayersResource\RelationManagers;
use App\Models\Players;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\DatePicker;
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
                Select::make('team_id')
                ->label('Team')
                ->relationship('team', 'name')
                ->required(),
            TextInput::make('name')->required()->maxLength(255),
            Select::make('position')->options([
                'GK' => 'Goalkeeper',
                'CB' => 'Center Back',
                'LB' => 'Left Back',
                'RB' => 'Right Back',
                'CDM' => 'Defensive Midfielder',
                'CM' => 'Central Midfielder',
                'CAM' => 'Attacking Midfielder',
                'LM' => 'Left Midfielder',
                'RM' => 'Right Midfielder',
                'LW' => 'Left Winger',
                'RW' => 'Right Winger',
                'CF' => 'Center Forward',
                'ST' => 'Striker',
            ])->required(),
            DatePicker::make('dob')->label('Date of Birth')->required(),
            TextInput::make('country')->required()->maxLength(50),
            TextInput::make('market_value')->numeric()->required(),
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
            'index' => Pages\ListPlayers::route('/'),
            'create' => Pages\CreatePlayers::route('/create'),
            'edit' => Pages\EditPlayers::route('/{record}/edit'),
        ];
    }
}
