<?php

namespace App\Filament\Resources\PlayerRatingsResource\Pages;

use App\Filament\Resources\PlayerRatingsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPlayerRatings extends EditRecord
{
    protected static string $resource = PlayerRatingsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
