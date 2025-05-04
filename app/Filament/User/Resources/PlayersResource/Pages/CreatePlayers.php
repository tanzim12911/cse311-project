<?php

namespace App\Filament\User\Resources\PlayersResource\Pages;

use App\Filament\User\Resources\PlayersResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePlayers extends CreateRecord
{
    protected static string $resource = PlayersResource::class;
}
