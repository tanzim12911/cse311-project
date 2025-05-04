<?php

namespace App\Filament\User\Resources\TransfersResource\Pages;

use App\Filament\User\Resources\TransfersResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTransfers extends EditRecord
{
    protected static string $resource = TransfersResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
