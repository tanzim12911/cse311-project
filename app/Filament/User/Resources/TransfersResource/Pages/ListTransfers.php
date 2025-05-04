<?php

namespace App\Filament\User\Resources\TransfersResource\Pages;

use App\Filament\User\Resources\TransfersResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTransfers extends ListRecords
{
    protected static string $resource = TransfersResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //Actions\CreateAction::make(),
        ];
    }
}
