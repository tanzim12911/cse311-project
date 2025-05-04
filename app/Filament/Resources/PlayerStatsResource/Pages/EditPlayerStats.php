<?php

namespace App\Filament\Resources\PlayerStatsResource\Pages;

use App\Filament\Resources\PlayerStatsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPlayerStats extends EditRecord
{
    protected static string $resource = PlayerStatsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
