<?php

namespace App\Filament\User\Widgets;

use App\Models\Transfers;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestTransfers extends BaseWidget
{
    protected int|string|array $columnSpan = 'full';
    
    public function table(Table $table): Table
    {
        return $table
            ->query(
                Transfers::query()
                    ->with(['player', 'fromTeam', 'toTeam'])
                    ->latest('transfer_date')
                    ->limit(3)
            )
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('player.name')->label('Player')->sortable()->searchable(),
                TextColumn::make('fromTeam.name')->label('From Team')->sortable(),
                TextColumn::make('toTeam.name')->label('To Team')->sortable(),
                TextColumn::make('transfer_date')->sortable(),
                TextColumn::make('transfer_fee')->sortable()->money('Euro'),
            ]);
    }
}
