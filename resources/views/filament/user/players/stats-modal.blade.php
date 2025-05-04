<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="space-y-2">
        @if ($player->stats)
            <ul class="grid grid-cols-2 gap-4 text-sm">
                <li><strong>Appearances:</strong> {{ $player->stats->appearances }}</li>
                <li><strong>Goals:</strong> {{ $player->stats->goals }}</li>
                <li><strong>Assists:</strong> {{ $player->stats->assists }}</li>
                <li><strong>Clean Sheets:</strong> {{ $player->stats->clean_sheets }}</li>
                <li><strong>Yellow Cards:</strong> {{ $player->stats->yellow_cards }}</li>
                <li><strong>Red Cards:</strong> {{ $player->stats->red_cards }}</li>
            </ul>
        @else
            <p class="text-gray-500">No stats available for this player.</p>
        @endif
    </div>
</div>
