<?php

namespace App\Filament\Resources\CompetitionsResource\Pages;

use App\Filament\Resources\CompetitionsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCompetitions extends ListRecords
{
    protected static string $resource = CompetitionsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
