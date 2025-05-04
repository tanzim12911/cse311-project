<?php

namespace App\Filament\Resources\PlayerRatingsResource\Pages;

use App\Filament\Resources\PlayerRatingsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPlayerRatings extends ListRecords
{
    protected static string $resource = PlayerRatingsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
