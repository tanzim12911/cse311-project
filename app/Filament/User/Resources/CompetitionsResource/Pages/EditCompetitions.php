<?php

namespace App\Filament\User\Resources\CompetitionsResource\Pages;

use App\Filament\User\Resources\CompetitionsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCompetitions extends EditRecord
{
    protected static string $resource = CompetitionsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
