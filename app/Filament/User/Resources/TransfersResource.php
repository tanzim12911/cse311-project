<?php

namespace App\Filament\User\Resources;

use Filament\Tables\Columns\TextColumn;
use App\Filament\User\Resources\TransfersResource\Pages;
use App\Filament\User\Resources\TransfersResource\RelationManagers;
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
                //
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
            'index' => Pages\ListTransfers::route('/'),
        ];
    }
}
