<?php

namespace App\Filament\Resources;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use App\Filament\Resources\TeamsResource\Pages;
use App\Filament\Resources\TeamsResource\RelationManagers;
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
                Select::make('competition_id')->relationship('competition', 'name')->required(),
                TextInput::make('name')->required()->maxLength(100),
                TextInput::make('stadium')->required()->maxLength(50),
                TextInput::make('Capacity')->numeric()->required(),
                TextInput::make('team_value')->numeric()->required(),
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
            'index' => Pages\ListTeams::route('/'),
            'create' => Pages\CreateTeams::route('/create'),
            'edit' => Pages\EditTeams::route('/{record}/edit'),
        ];
    }
}
