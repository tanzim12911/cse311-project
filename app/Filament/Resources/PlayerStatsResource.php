<?php

namespace App\Filament\Resources;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use App\Filament\Resources\PlayerStatsResource\Pages;
use App\Filament\Resources\PlayerStatsResource\RelationManagers;
use App\Models\PlayerStats;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PlayerStatsResource extends Resource
{
    protected static ?string $model = PlayerStats::class;

    protected static ?string $navigationIcon = 'heroicon-o-presentation-chart-line';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('player_id')
                    ->relationship('player', 'name')
                    ->required()
                    ->searchable(),
                TextInput::make('appearances')->numeric()->minValue(0)->required(),
                TextInput::make('goals')->numeric()->minValue(0)->default(0),
                TextInput::make('assists')->numeric()->minValue(0)->default(0),
                TextInput::make('clean_sheets')->numeric()->minValue(0)->default(0),
                TextInput::make('yellow_cards')->numeric()->minValue(0)->default(0),
                TextInput::make('red_cards')->numeric()->minValue(0)->default(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('player.name')->label('Player')->searchable(),
                TextColumn::make('appearances')->sortable(),
                TextColumn::make('goals')->sortable(),
                TextColumn::make('assists')->sortable(),
                TextColumn::make('clean_sheets')->label('Clean Sheets')->sortable(),
                TextColumn::make('yellow_cards')->label('Yellows')->sortable(),
                TextColumn::make('red_cards')->label('Reds')->sortable(),
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
            'index' => Pages\ListPlayerStats::route('/'),
            'create' => Pages\CreatePlayerStats::route('/create'),
            'edit' => Pages\EditPlayerStats::route('/{record}/edit'),
        ];
    }
}
