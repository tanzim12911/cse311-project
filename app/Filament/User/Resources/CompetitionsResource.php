<?php

namespace App\Filament\User\Resources;

use Filament\Tables\Columns\TextColumn;
use App\Filament\User\Resources\CompetitionsResource\Pages;
use App\Filament\User\Resources\CompetitionsResource\RelationManagers;
use App\Models\Competitions;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CompetitionsResource extends Resource
{
    protected static ?string $model = Competitions::class;

    protected static ?string $navigationIcon = 'heroicon-o-trophy';

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
                TextColumn::make('type')->sortable(),
                TextColumn::make('season')->sortable(),
                TextColumn::make('country')->sortable(),
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
            'index' => Pages\ListCompetitions::route('/'),
        ];
    }
}
