<?php

namespace App\Filament\User\Resources\PlayersResource\Pages;

use App\Filament\User\Resources\PlayersResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPlayers extends EditRecord
{
    protected static string $resource = PlayersResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
