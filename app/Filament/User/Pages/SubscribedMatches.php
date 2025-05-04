<?php

namespace App\Filament\User\Pages;

use Filament\Pages\Page;

class SubscribedMatches extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.user.pages.subscribed-matches';

    public $subscribedMatches;

    public function mount()
    {
        // Fetch the subscribed matches for the authenticated user
        $this->subscribedMatches = auth()->user()->watchlist()->with(['homeTeam', 'awayTeam', 'competition'])->get();
    }
}
