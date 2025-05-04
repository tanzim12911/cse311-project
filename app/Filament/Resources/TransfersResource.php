<?php

namespace App\Filament\Resources;

use App\Models\Players;
use App\Models\Teams;
use Filament\Forms\Components\DatePicker;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use App\Filament\Resources\TransfersResource\Pages;
use App\Filament\Resources\TransfersResource\RelationManagers;
use App\Models\Transfers;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TransfersResource extends Resource
{
    protected static ?string $model = Transfers::class;

    protected static ?string $navigationIcon = 'heroicon-o-chevron-double-right';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('player_id')
                    ->label('Player')
                    ->relationship('player', 'name')
                    ->required(),

                Select::make('from_team_id')
                    ->label('From Team')
                    ->relationship('fromTeam', 'name')
                    ->required(),

                Select::make('to_team_id')
                    ->label('To Team')
                    ->relationship('toTeam', 'name')
                    ->required(),

                DatePicker::make('transfer_date')
                    ->required()
                    ->default(now()),

                TextInput::make('transfer_fee')
                    ->label('Transfer Fee (in millions)')
                    ->numeric()
                    ->required()
                    ->default(0)
                    ->rule('min:0'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('player.name')->label('Player')->sortable()->searchable(),
                TextColumn::make('fromTeam.name')->label('From Team')->sortable(),
                TextColumn::make('toTeam.name')->label('To Team')->sortable(),
                TextColumn::make('transfer_date')->sortable(),
                TextColumn::make('transfer_fee')->sortable()->money('Euro'),
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
            'index' => Pages\ListTransfers::route('/'),
            'create' => Pages\CreateTransfers::route('/create'),
            'edit' => Pages\EditTransfers::route('/{record}/edit'),
        ];
    }
}
