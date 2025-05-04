<x-filament::page>
    <x-slot name="header">
        <h2 class="text-xl font-bold text-gray-800">
            Subscribed Matches
        </h2>
    </x-slot>

    <div class="space-y-6">
        @foreach ($subscribedMatches as $match)
            <div class="flex items-center justify-between p-4 bg-white shadow rounded-lg">
                <div>
                    <h3 class="text-lg font-medium text-gray-800">{{ $match->homeTeam->name }} vs {{ $match->awayTeam->name }}</h3>
                    <p class="text-sm text-gray-600">{{ $match->competition->name }}</p>
                    <p class="text-sm text-gray-500">{{ $match->date }}</p>
                    <p class="text-sm text-gray-400">{{ $match->venue }}</p>
                </div>
                <div>
                    <span class="inline-block px-3 py-1 text-sm font-semibold rounded-full 
                        @if ($match->status === 'in-progress') bg-yellow-100 text-yellow-800
                        @elseif ($match->status === 'completed') bg-green-100 text-green-800
                        @else bg-gray-100 text-gray-800 @endif">
                        {{ ucfirst($match->status) }}
                    </span>
                </div>
            </div>
        @endforeach
    </div>
</x-filament::page>
