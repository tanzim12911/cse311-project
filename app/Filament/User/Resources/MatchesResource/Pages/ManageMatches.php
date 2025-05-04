<?php

namespace App\Filament\User\Resources\MatchesResource\Pages;

use App\Filament\User\Resources\MatchesResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageMatches extends ManageRecords
{
    protected static string $resource = MatchesResource::class;

    // protected function getHeaderActions(): array
    // {
    //     return [
    //         Actions\CreateAction::make(),
    //     ];
    // }
}
